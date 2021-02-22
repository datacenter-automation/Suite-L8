<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketCommentStoreRequest;
use App\Http\Requests\TicketCommentUpdateRequest;
use App\Models\TicketComment;
use Illuminate\Http\Request;

class TicketCommentController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ticketComments = TicketComment::all();

        return view('ticketComment.index', compact('ticketComments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ticketComment.create');
    }

    /**
     * @param \App\Http\Requests\TicketCommentStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TicketCommentStoreRequest $request)
    {
        $ticketComment = TicketComment::create($request->validated());

        $request->session()->flash('ticketComment.id', $ticketComment->id);

        return redirect()->route('ticketComment.index');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\TicketComment $ticketComment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TicketComment $ticketComment)
    {
        return view('ticketComment.show', compact('ticketComment'));
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\TicketComment $ticketComment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TicketComment $ticketComment)
    {
        return view('ticketComment.edit', compact('ticketComment'));
    }

    /**
     * @param \App\Http\Requests\TicketCommentUpdateRequest $request
     * @param \App\Models\TicketComment                     $ticketComment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TicketCommentUpdateRequest $request, TicketComment $ticketComment)
    {
        $ticketComment->update($request->validated());

        $request->session()->flash('ticketComment.id', $ticketComment->id);

        return redirect()->route('ticketComment.index');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\TicketComment $ticketComment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TicketComment $ticketComment)
    {
        $ticketComment->delete();

        return redirect()->route('ticketComment.index');
    }
}
