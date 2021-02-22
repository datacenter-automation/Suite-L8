<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketWorkerStoreRequest;
use App\Http\Requests\TicketWorkerUpdateRequest;
use App\Models\TicketWorker;
use Illuminate\Http\Request;

class TicketWorkerController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $ticketWorkers = TicketWorker::all();

        return view('ticketWorker.index', compact('ticketWorkers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticketWorker.create');
    }

    /**
     * @param \App\Http\Requests\TicketWorkerStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketWorkerStoreRequest $request)
    {
        $ticketWorker = TicketWorker::create($request->validated());

        $request->session()->flash('ticketWorker.id', $ticketWorker->id);

        return redirect()->route('ticketWorker.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketWorker $ticketWorker
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, TicketWorker $ticketWorker)
    {
        return view('ticketWorker.show', compact('ticketWorker'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketWorker $ticketWorker
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, TicketWorker $ticketWorker)
    {
        return view('ticketWorker.edit', compact('ticketWorker'));
    }

    /**
     * @param \App\Http\Requests\TicketWorkerUpdateRequest $request
     * @param \App\Models\TicketWorker                     $ticketWorker
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketWorkerUpdateRequest $request, TicketWorker $ticketWorker)
    {
        $ticketWorker->update($request->validated());

        $request->session()->flash('ticketWorker.id', $ticketWorker->id);

        return redirect()->route('ticketWorker.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TicketWorker $ticketWorker
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TicketWorker $ticketWorker)
    {
        $ticketWorker->delete();

        return redirect()->route('ticketWorker.index');
    }
}
