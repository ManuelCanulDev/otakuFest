<?php

namespace App\Http\Controllers;

use App\Mail\BoletosPrePagados;
use App\Models\OrdenDeTicket;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PDF;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate();

        return view('ticket.index', compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        return view('ticket.create', compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ticket::$rules);

        $ticket = Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }

    public function adquirirBoletos()
    {
        $hoy = CarbonImmutable::now();

        $tickets = TypeTicket::where([['fecha_vencimiento_ticket', '>', $hoy]])->get();
        return view('adquirir-boletos', compact('tickets'));
    }

    public function generarOrden(Request $request)
    {
        $enCincoDias = CarbonImmutable::now()->add(5, 'day');

        $total = 0;

        $tickets_seleccionados = (array) json_decode($request->tickets, true);

        //print_r($tickets_seleccionados['tickets']);

        foreach ($tickets_seleccionados['tickets'] as $ticket => $value) {
            $ticketdb = TypeTicket::where([['id', '=', $value['id']]])->get();

            $subtotal = $ticketdb[0]['costo_ticket'] * $value['amount'];

            $total += $subtotal;
        }

        //echo $total;

        //return false;

        $nuevaOrden = new OrdenDeTicket();

        $nuevaOrden->user_id = Auth::user()->id;
        $nuevaOrden->telefono_orden = $request->phone;
        $nuevaOrden->correo_orden = $request->email;
        $nuevaOrden->token = Str::random(50);
        $nuevaOrden->uid = rand(99999, 9999999999);
        $nuevaOrden->fecha_vencimiento_orden = $enCincoDias;
        $nuevaOrden->costo_total_orden = $total;
        $nuevaOrden->pagado = "NO";
        $nuevaOrden->save();

        foreach ($tickets_seleccionados['tickets'] as $ticket => $value) {

            for ($i = 1; $i <= $value['amount']; $i++) {
                $nuevoTicket = new Ticket();
                $nuevoTicket->type_ticket_id = $value['id'];
                $nuevoTicket->user_id = Auth::user()->id;
                $nuevoTicket->orden_id = $nuevaOrden->id;
                $nuevoTicket->asistio = false;
                $nuevoTicket->pagado = false;
                $nuevoTicket->token = Str::random(50);
                $nuevoTicket->status = "D";
                $nuevoTicket->save();
            }
        }

        Mail::to($nuevaOrden->correo_orden)->send(new BoletosPrePagados($nuevaOrden->uid, $nuevaOrden->costo_total_orden));

        return redirect('/gracias-por-tu-compra/' . $nuevaOrden->uid);
    }

    public function graciasPorTuCompra($uid = null)
    {
        if ($uid != null) {
            $ordenTicket = OrdenDeTicket::where([['uid', '=', $uid]])->get();
            return view('graciasPorTuCompra', compact('ordenTicket'));
        } else {
            return redirect('home');
        }
    }

    public function verMisBoletos()
    {
        $boletos = Ticket::where([['user_id', '=', Auth::user()->id]])->get();
        return view('verMisBoletos', compact('boletos'));
    }

    public function descargarBoletos($token = null)
    {

        //$pdf = PDF::loadView('prueba', $data)->setPaper('a4', 'landscape');

        $ticket = Ticket::where('token', $token)->firstOrFail();

        //return $pdf->download('onlinewebtutorblog.pdf');


        $view = view('boleto-final',compact('ticket'));
        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html);

        return $pdf->download('TICKET_OTAKU_FEST_2022.pdf');
    }

    public function verificarBoleto(Request $request)
    {
        $token_boleto = $request->get('token_boleto');

        $ticket = Ticket::where('token',$token_boleto)->first();

        //VALIDAR SI EL BOLETO EXISTE
        if($ticket != null){

            if($ticket->nombres == ''){
                return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('No tiene asignado nombre.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
            }

            if($ticket->apellidos == ''){
                return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('No tiene asignado apellidos.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
            }

            if(!$ticket->pagado){
                return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('No tiene pagado este boleto.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
            }

            if($ticket->status != 'A'){
                return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('No tiene aprobado este boleto.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
            }

            $typeTicket = TypeTicket::find($ticket->type_ticket_id);

            if($typeTicket->valido == 'U'){

                //AGREGAR VALIDACION DE FECHA DE ASISTENCIA.
                if($ticket->fecha_asistencia == null){
                    return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('Para este tipo de boleto, debe de seleccionar la fecha de asistencia.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
                }

                if(date('Y-m-d') != $ticket->fecha_asistencia){
                    return response(['status' => false, 'system_msg' => 'medium', 'mensaje' => Str::upper('La fecha del boleto, no es hoy. Verifique.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
                }

                if($ticket->asistio && $ticket->quemado){
                    return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('Este boleto ya ha sido marcado como asistido.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
                }else{
                    //MARCAR COMO QUEMADO Y MOSTRAR MENSAJE GOOD.
                    $ticket->asistio = true;
                    $ticket->quemado = true;
                    $ticket->save();

                    return response(['status' => true, 'system_msg' => 'good', 'mensaje' => Str::upper("BOLETO VALIDO, BIENVENIDO"), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],200);
                }
            }

            if($typeTicket->valido == 'I'){
                //YA NO ES NECESARIO VALIDAR NADA, HAY QUE MOSTRAR TODO GOOD.
                return response(['status' => true, 'system_msg' => 'good', 'mensaje' => Str::upper("BOLETO VALIDO, BIENVENIDO"), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],200);
            }

            if($typeTicket->valido == 'D'){
                if(!$ticket->asistio && !$ticket->quemado){
                    //MARCAR COMO ASISTIO PERO NO QUEMAR
                    $ticket->asistio = true;
                    //$ticket->quemado = true;
                    $ticket->save();
                    return response(['status' => true, 'system_msg' => 'good', 'mensaje' => Str::upper("BOLETO VALIDO, DIA 1 CONFIRMADO"), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],200);
                }

                if($ticket->asistio && !$ticket->quemado){
                    //QUEMAR EL BOLETO
                    //$ticket->asistio = true;
                    $ticket->quemado = true;
                    $ticket->save();
                    return response(['status' => true, 'system_msg' => 'good', 'mensaje' => Str::upper("BOLETO VALIDO, DIA 2 CONFIRMADO"), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],200);
                }

                if($ticket->asistio && $ticket->quemado){
                    //DECIR QUE YA ESTA QUEMADO
                    return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => Str::upper('Este boleto ya ha sido marcado como asistido.'), 'data' => ['tipo_de_ticket' => $ticket->typeTicket->nombre_ticket, 'orden_de_compra' => $ticket->orden->uid, 'nombre_asistente' => $ticket->nombres." ".$ticket->apellidos]],400);
                }
            }

        }else{
            return response(['status' => false, 'system_msg' => 'bad', 'mensaje' => 'Este Boleto NO existe.', 'data' => ['tipo_de_ticket' => null, 'orden_de_compra' => null]],400);
        }
    }
}
