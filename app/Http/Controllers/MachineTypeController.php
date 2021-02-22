<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineTypeStoreRequest;
use App\Http\Requests\MachineTypeUpdateRequest;
use App\Models\MachineType;
use Illuminate\Http\Request;

class MachineTypeController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $machineTypes = MachineType::all();

        return view('machineType.index', compact('machineTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('machineType.create');
    }

    /**
     * @param \App\Http\Requests\MachineTypeStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MachineTypeStoreRequest $request)
    {
        $machineType = MachineType::create($request->validated());

        $request->session()->flash('machineType.id', $machineType->id);

        return redirect()->route('machineType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineType  $machineType
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, MachineType $machineType)
    {
        return view('machineType.show', compact('machineType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineType  $machineType
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, MachineType $machineType)
    {
        return view('machineType.edit', compact('machineType'));
    }

    /**
     * @param \App\Http\Requests\MachineTypeUpdateRequest $request
     * @param \App\Models\MachineType                     $machineType
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MachineTypeUpdateRequest $request, MachineType $machineType)
    {
        $machineType->update($request->validated());

        $request->session()->flash('machineType.id', $machineType->id);

        return redirect()->route('machineType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineType  $machineType
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, MachineType $machineType)
    {
        $machineType->delete();

        return redirect()->route('machineType.index');
    }
}
