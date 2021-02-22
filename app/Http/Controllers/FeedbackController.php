<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStoreRequest;
use App\Http\Requests\FeedbackUpdateRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $feedback = Feedback::all();

        return view('feedback.index', compact('feedback'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('feedback.create');
    }

    /**
     * @param \App\Http\Requests\FeedbackStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create($request->validated());

        $request->session()->flash('feedback.id', $feedback->id);

        return redirect()->route('feedback.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback     $feedback
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback     $feedback
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * @param \App\Http\Requests\FeedbackUpdateRequest $request
     * @param \App\Models\Feedback                     $feedback
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FeedbackUpdateRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());

        $request->session()->flash('feedback.id', $feedback->id);

        return redirect()->route('feedback.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback     $feedback
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedback.index');
    }
}
