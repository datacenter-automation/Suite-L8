<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineNoteStoreRequest;
use App\Http\Requests\MachineNoteUpdateRequest;
use App\Models\MachineNote;
use Illuminate\Http\Request;

class MachineNoteController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $machineNotes = MachineNote::all();

        return view('machineNote.index', compact('machineNotes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('machineNote.create');
    }

    /**
     * @param \App\Http\Requests\MachineNoteStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MachineNoteStoreRequest $request)
    {
        $machineNote = MachineNote::create($request->validated());

        $request->session()->flash('machineNote.id', $machineNote->id);

        return redirect()->route('machineNote.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineNote  $machineNote
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, MachineNote $machineNote)
    {
        return view('machineNote.show', compact('machineNote'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineNote  $machineNote
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, MachineNote $machineNote)
    {
        return view('machineNote.edit', compact('machineNote'));
    }

    /**
     * @param \App\Http\Requests\MachineNoteUpdateRequest $request
     * @param \App\Models\MachineNote                     $machineNote
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MachineNoteUpdateRequest $request, MachineNote $machineNote)
    {
        $machineNote->update($request->validated());

        $request->session()->flash('machineNote.id', $machineNote->id);

        return redirect()->route('machineNote.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MachineNote  $machineNote
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, MachineNote $machineNote)
    {
        $machineNote->delete();

        return redirect()->route('machineNote.index');
    }
}
