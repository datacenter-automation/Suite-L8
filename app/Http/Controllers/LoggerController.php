<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoggerStoreRequest;
use App\Http\Requests\LoggerUpdateRequest;
use App\Models\Logger;
use Illuminate\Http\Request;

class LoggerController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $loggers = Logger::all();

        return view('logger.index', compact('loggers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('logger.create');
    }

    /**
     * @param \App\Http\Requests\LoggerStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoggerStoreRequest $request)
    {
        $logger = Logger::create($request->validated());

        $request->session()->flash('logger.id', $logger->id);

        return redirect()->route('logger.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Logger       $logger
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Logger $logger)
    {
        return view('logger.show', compact('logger'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Logger       $logger
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Logger $logger)
    {
        return view('logger.edit', compact('logger'));
    }

    /**
     * @param \App\Http\Requests\LoggerUpdateRequest $request
     * @param \App\Models\Logger                     $logger
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LoggerUpdateRequest $request, Logger $logger)
    {
        $logger->update($request->validated());

        $request->session()->flash('logger.id', $logger->id);

        return redirect()->route('logger.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Logger       $logger
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Logger $logger)
    {
        $logger->delete();

        return redirect()->route('logger.index');
    }
}
