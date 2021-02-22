<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineStoreRequest;
use App\Http\Requests\MachineUpdateRequest;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $machines = Machine::all();

        return view('machine.index', compact('machines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('machine.create');
    }

    /**
     * @param \App\Http\Requests\MachineStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MachineStoreRequest $request)
    {
        $machine = Machine::create($request->validated());

        $request->session()->flash('machine.id', $machine->id);

        return redirect()->route('machine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Machine      $machine
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Machine $machine)
    {
        return view('machine.show', compact('machine'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Machine      $machine
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Machine $machine)
    {
        return view('machine.edit', compact('machine'));
    }

    /**
     * @param \App\Http\Requests\MachineUpdateRequest $request
     * @param \App\Models\Machine                     $machine
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MachineUpdateRequest $request, Machine $machine)
    {
        $machine->update($request->validated());

        $request->session()->flash('machine.id', $machine->id);

        return redirect()->route('machine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Machine      $machine
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Machine $machine)
    {
        $machine->delete();

        return redirect()->route('machine.index');
    }
}
