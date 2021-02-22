<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineLogStoreRequest;
use App\Http\Requests\MachineLogUpdateRequest;
use App\Models\MachineLog;
use Illuminate\Http\Request;

class MachineLogController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $machineLogs = MachineLog::all();

        return view('machineLog.index', compact('machineLogs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('machineLog.create');
    }

    /**
     * @param \App\Http\Requests\MachineLogStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MachineLogStoreRequest $request)
    {
        $machineLog = MachineLog::create($request->validated());

        $request->session()->flash('machineLog.id', $machineLog->id);

        return redirect()->route('machineLog.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineLog   $machineLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, MachineLog $machineLog)
    {
        return view('machineLog.show', compact('machineLog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineLog   $machineLog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, MachineLog $machineLog)
    {
        return view('machineLog.edit', compact('machineLog'));
    }

    /**
     * @param \App\Http\Requests\MachineLogUpdateRequest $request
     * @param \App\Models\MachineLog                     $machineLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MachineLogUpdateRequest $request, MachineLog $machineLog)
    {
        $machineLog->update($request->validated());

        $request->session()->flash('machineLog.id', $machineLog->id);

        return redirect()->route('machineLog.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineLog   $machineLog
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, MachineLog $machineLog)
    {
        $machineLog->delete();

        return redirect()->route('machineLog.index');
    }
}
