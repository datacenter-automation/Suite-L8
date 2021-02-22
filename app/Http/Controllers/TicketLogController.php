<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketLogStoreRequest;
use App\Http\Requests\TicketLogUpdateRequest;
use App\Models\TicketLog;
use Illuminate\Http\Request;

class TicketLogController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $ticketLogs = TicketLog::all();

        return view('ticket_logs.index', compact('ticketLogs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticket_logs.create');
    }

    /**
     * @param \App\Http\Requests\TicketLogStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketLogStoreRequest $request)
    {
        $ticketLog = TicketLog::create($request->validated());

        $request->session()->flash('ticketLog.id', $ticketLog->id);

        return redirect()->route('ticketLog.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketLog    $ticketLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, TicketLog $ticketLog)
    {
        return view('ticket_logs.show', compact('ticketLog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketLog    $ticketLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, TicketLog $ticketLog)
    {
        return view('ticket_logs.edit', compact('ticketLog'));
    }

    /**
     * @param \App\Http\Requests\TicketLogUpdateRequest $request
     * @param \App\Models\TicketLog                     $ticketLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketLogUpdateRequest $request, TicketLog $ticketLog)
    {
        $ticketLog->update($request->validated());

        $request->session()->flash('ticketLog.id', $ticketLog->id);

        return redirect()->route('ticketLog.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketLog    $ticketLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TicketLog $ticketLog)
    {
        $ticketLog->delete();

        return redirect()->route('ticketLog.index');
    }
}
