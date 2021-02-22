<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLogStoreRequest;
use App\Http\Requests\AuthLogUpdateRequest;
use App\Models\AuthLog;
use Illuminate\Http\Request;

class AuthLogController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $authLogs = AuthLog::all();

        return view('auth_logs.index', compact('authLogs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('auth_logs.create');
    }

    /**
     * @param \App\Http\Requests\AuthLogStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthLogStoreRequest $request)
    {
        $authLog = AuthLog::create($request->validated());

        $request->session()->flash('authLog.id', $authLog->id);

        return redirect()->route('auth_logs.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AuthLog      $authLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, AuthLog $authLog)
    {
        return view('auth_logs.show', compact('authLog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AuthLog      $authLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, AuthLog $authLog)
    {
        return view('auth_logs.edit', compact('authLog'));
    }

    /**
     * @param \App\Http\Requests\AuthLogUpdateRequest $request
     * @param \App\Models\AuthLog                     $authLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AuthLogUpdateRequest $request, AuthLog $authLog)
    {
        $authLog->update($request->validated());

        $request->session()->flash('authLog.id', $authLog->id);

        return redirect()->route('authLog.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AuthLog      $authLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, AuthLog $authLog)
    {
        $authLog->delete();

        return redirect()->route('authLog.index');
    }
}
