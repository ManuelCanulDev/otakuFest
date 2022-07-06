<?php

namespace App\Http\Controllers;

use App\Mail\BoletosPrePagados;
use App\Mail\EmergencyCallReceived;
use App\Models\OrdenDeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class OrdenDeTicketController
 * @package App\Http\Controllers
 */
class OrdenDeTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenDeTickets = OrdenDeTicket::paginate();

        return view('orden-de-ticket.index', compact('ordenDeTickets'))
            ->with('i', (request()->input('page', 1) - 1) * $ordenDeTickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordenDeTicket = new OrdenDeTicket();
        return view('orden-de-ticket.create', compact('ordenDeTicket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrdenDeTicket::$rules);

        $ordenDeTicket = OrdenDeTicket::create($request->all());

        return redirect()->route('orden-de-tickets.index')
            ->with('success', 'OrdenDeTicket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordenDeTicket = OrdenDeTicket::find($id);

        return view('orden-de-ticket.show', compact('ordenDeTicket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordenDeTicket = OrdenDeTicket::find($id);

        return view('orden-de-ticket.edit', compact('ordenDeTicket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrdenDeTicket $ordenDeTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenDeTicket $ordenDeTicket)
    {
        request()->validate(OrdenDeTicket::$rules);

        $ordenDeTicket->update($request->all());

        return redirect()->route('orden-de-tickets.index')
            ->with('success', 'OrdenDeTicket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ordenDeTicket = OrdenDeTicket::find($id)->delete();

        return redirect()->route('orden-de-tickets.index')
            ->with('success', 'OrdenDeTicket deleted successfully');
    }

    public function verMisOrdenes()
    {
        $ordenes = OrdenDeTicket::where([['user_id','=',Auth::user()->id]])->get();
        return view('verMisOrdenes', compact('ordenes'));
    }

    public function prueba()
    {
        //$orden = OrdenDeTicket::find(rand(1,2));
        return view('prueba');
        //Mail::to("jafet.ramsell@gmail.com")->send(new BoletosPrePagados("UID_VM9nL3D19B4"));
    }

    public function reenviarCorreoOrden($uid = null)
    {
        if($uid != null){
            $ordenTicket = OrdenDeTicket::where([['uid','=',$uid]])->get();
            Mail::to($ordenTicket[0]->correo_orden)->send(new BoletosPrePagados($uid));
            return redirect('/gracias-por-tu-compra/'.$uid);
        }else{
            return redirect('home');
        }
    }
}
