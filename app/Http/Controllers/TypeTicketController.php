<?php

namespace App\Http\Controllers;

use App\Models\TypeTicket;
use Illuminate\Http\Request;

/**
 * Class TypeTicketController
 * @package App\Http\Controllers
 */
class TypeTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeTickets = TypeTicket::paginate();

        return view('type-ticket.index', compact('typeTickets'))
            ->with('i', (request()->input('page', 1) - 1) * $typeTickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeTicket = new TypeTicket();
        return view('type-ticket.create', compact('typeTicket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeTicket::$rules);

        $typeTicket = TypeTicket::create($request->all());

        return redirect()->route('type-tickets.index')
            ->with('success', 'TypeTicket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeTicket = TypeTicket::find($id);

        return view('type-ticket.show', compact('typeTicket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeTicket = TypeTicket::find($id);

        return view('type-ticket.edit', compact('typeTicket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeTicket $typeTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeTicket $typeTicket)
    {
        request()->validate(TypeTicket::$rules);

        $typeTicket->update($request->all());

        return redirect()->route('type-tickets.index')
            ->with('success', 'TypeTicket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeTicket = TypeTicket::find($id)->delete();

        return redirect()->route('type-tickets.index')
            ->with('success', 'TypeTicket deleted successfully');
    }
}
