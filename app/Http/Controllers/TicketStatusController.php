<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStatusStoreRequest;
use App\Http\Requests\TicketStatusUpdateRequest;
use App\Models\TicketStatus;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $ticketStatuses = TicketStatus::all();

        return view('ticketStatus.index', compact('ticketStatuses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticketStatus.create');
    }

    /**
     * @param \App\Http\Requests\TicketStatusStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketStatusStoreRequest $request)
    {
        $ticketStatus = TicketStatus::create($request->validated());

        $request->session()->flash('ticketStatus.id', $ticketStatus->id);

        return redirect()->route('ticketStatus.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketStatus $ticketStatus
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, TicketStatus $ticketStatus)
    {
        return view('ticketStatus.show', compact('ticketStatus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketStatus $ticketStatus
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, TicketStatus $ticketStatus)
    {
        return view('ticketStatus.edit', compact('ticketStatus'));
    }

    /**
     * @param \App\Http\Requests\TicketStatusUpdateRequest $request
     * @param \App\Models\TicketStatus                     $ticketStatus
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketStatusUpdateRequest $request, TicketStatus $ticketStatus)
    {
        $ticketStatus->update($request->validated());

        $request->session()->flash('ticketStatus.id', $ticketStatus->id);

        return redirect()->route('ticketStatus.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketStatus $ticketStatus
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TicketStatus $ticketStatus)
    {
        $ticketStatus->delete();

        return redirect()->route('ticketStatus.index');
    }
}
