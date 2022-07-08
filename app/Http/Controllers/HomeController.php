<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = TypeTicket::all();

        $typeTicket = [];

        foreach ($tickets as $key => $type) {
            $cantidadDeTickets = Ticket::where([['type_ticket_id', '=', $type->id],['pagado','=',true],['status','=','A']])->get();
            $cuantosTickets = $cantidadDeTickets->count();

            $type['cuantos_quedan'] = $type->cuantos_ticket - $cuantosTickets;

            array_push($typeTicket,$type);
        }

        return view('home', compact('typeTicket'));
    }
}
