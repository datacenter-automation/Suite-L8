<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageStoreRequest;
use App\Http\Requests\MessageUpdateRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $messages = Message::all();

        return view('message.index', compact('messages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('message.create');
    }

    /**
     * @param \App\Http\Requests\MessageStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MessageStoreRequest $request)
    {
        $message = Message::create($request->validated());

        $request->session()->flash('message.id', $message->id);

        return redirect()->route('message.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Message      $message
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Message $message)
    {
        return view('message.show', compact('message'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Message      $message
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Message $message)
    {
        return view('message.edit', compact('message'));
    }

    /**
     * @param \App\Http\Requests\MessageUpdateRequest $request
     * @param \App\Models\Message                     $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MessageUpdateRequest $request, Message $message)
    {
        $message->update($request->validated());

        $request->session()->flash('message.id', $message->id);

        return redirect()->route('message.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Message      $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Message $message)
    {
        $message->delete();

        return redirect()->route('message.index');
    }
}
