<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketAttachmentStoreRequest;
use App\Http\Requests\TicketAttachmentUpdateRequest;
use App\Models\TicketAttachment;
use Illuminate\Http\Request;

class TicketAttachmentController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $ticketAttachments = TicketAttachment::all();

        return view('ticketAttachment.index', compact('ticketAttachments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticketAttachment.create');
    }

    /**
     * @param \App\Http\Requests\TicketAttachmentStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketAttachmentStoreRequest $request)
    {
        $ticketAttachment = TicketAttachment::create($request->validated());

        $request->session()->flash('ticketAttachment.id', $ticketAttachment->id);

        return redirect()->route('ticketAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\TicketAttachment $ticketAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, TicketAttachment $ticketAttachment)
    {
        return view('ticketAttachment.show', compact('ticketAttachment'));
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\TicketAttachment $ticketAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, TicketAttachment $ticketAttachment)
    {
        return view('ticketAttachment.edit', compact('ticketAttachment'));
    }

    /**
     * @param \App\Http\Requests\TicketAttachmentUpdateRequest $request
     * @param \App\Models\TicketAttachment                     $ticketAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketAttachmentUpdateRequest $request, TicketAttachment $ticketAttachment)
    {
        $ticketAttachment->update($request->validated());

        $request->session()->flash('ticketAttachment.id', $ticketAttachment->id);

        return redirect()->route('ticketAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\TicketAttachment $ticketAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TicketAttachment $ticketAttachment)
    {
        $ticketAttachment->delete();

        return redirect()->route('ticketAttachment.index');
    }
}
