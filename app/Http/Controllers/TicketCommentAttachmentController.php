<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketCommentAttachmentStoreRequest;
use App\Http\Requests\TicketCommentAttachmentUpdateRequest;
use App\Models\TicketCommentAttachment;
use Illuminate\Http\Request;

class TicketCommentAttachmentController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $ticketCommentAttachments = TicketCommentAttachment::all();

        return view('ticketCommentAttachment.index', compact('ticketCommentAttachments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('ticketCommentAttachment.create');
    }

    /**
     * @param \App\Http\Requests\TicketCommentAttachmentStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketCommentAttachmentStoreRequest $request)
    {
        $ticketCommentAttachment = TicketCommentAttachment::create($request->validated());

        $request->session()->flash('ticketCommentAttachment.id', $ticketCommentAttachment->id);

        return redirect()->route('ticketCommentAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \App\Models\TicketCommentAttachment $ticketCommentAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, TicketCommentAttachment $ticketCommentAttachment)
    {
        return view('ticketCommentAttachment.show', compact('ticketCommentAttachment'));
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \App\Models\TicketCommentAttachment $ticketCommentAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, TicketCommentAttachment $ticketCommentAttachment)
    {
        return view('ticketCommentAttachment.edit', compact('ticketCommentAttachment'));
    }

    /**
     * @param \App\Http\Requests\TicketCommentAttachmentUpdateRequest $request
     * @param \App\Models\TicketCommentAttachment                     $ticketCommentAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        TicketCommentAttachmentUpdateRequest $request,
        TicketCommentAttachment $ticketCommentAttachment
    ) {
        $ticketCommentAttachment->update($request->validated());

        $request->session()->flash('ticketCommentAttachment.id', $ticketCommentAttachment->id);

        return redirect()->route('ticketCommentAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \App\Models\TicketCommentAttachment $ticketCommentAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TicketCommentAttachment $ticketCommentAttachment)
    {
        $ticketCommentAttachment->delete();

        return redirect()->route('ticketCommentAttachment.index');
    }
}
