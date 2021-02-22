<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $tickets = Ticket::all();

        return view('ticket.index', compact('tickets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticket.create');
    }

    /**
     * @param \App\Http\Requests\TicketStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::create($request->validated());

        $request->session()->flash('ticket.id', $ticket->id);

        return redirect()->route('ticket.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket       $ticket
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket       $ticket
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * @param \App\Http\Requests\TicketUpdateRequest $request
     * @param \App\Models\Ticket                     $ticket
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());

        $request->session()->flash('ticket.id', $ticket->id);

        return redirect()->route('ticket.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket       $ticket
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index');
    }
}
