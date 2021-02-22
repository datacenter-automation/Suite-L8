<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineNoteAttachmentStoreRequest;
use App\Http\Requests\MachineNoteAttachmentUpdateRequest;
use App\Models\MachineNoteAttachment;
use Illuminate\Http\Request;

class MachineNoteAttachmentController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $machineNoteAttachments = MachineNoteAttachment::all();

        return view('machineNoteAttachment.index', compact('machineNoteAttachments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('machineNoteAttachment.create');
    }

    /**
     * @param \App\Http\Requests\MachineNoteAttachmentStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MachineNoteAttachmentStoreRequest $request)
    {
        $machineNoteAttachment = MachineNoteAttachment::create($request->validated());

        $request->session()->flash('machineNoteAttachment.id', $machineNoteAttachment->id);

        return redirect()->route('machineNoteAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request          $request
     * @param \App\Models\MachineNoteAttachment $machineNoteAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, MachineNoteAttachment $machineNoteAttachment)
    {
        return view('machineNoteAttachment.show', compact('machineNoteAttachment'));
    }

    /**
     * @param \Illuminate\Http\Request          $request
     * @param \App\Models\MachineNoteAttachment $machineNoteAttachment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, MachineNoteAttachment $machineNoteAttachment)
    {
        return view('machineNoteAttachment.edit', compact('machineNoteAttachment'));
    }

    /**
     * @param \App\Http\Requests\MachineNoteAttachmentUpdateRequest $request
     * @param \App\Models\MachineNoteAttachment                     $machineNoteAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MachineNoteAttachmentUpdateRequest $request, MachineNoteAttachment $machineNoteAttachment)
    {
        $machineNoteAttachment->update($request->validated());

        $request->session()->flash('machineNoteAttachment.id', $machineNoteAttachment->id);

        return redirect()->route('machineNoteAttachment.index');
    }

    /**
     * @param \Illuminate\Http\Request          $request
     * @param \App\Models\MachineNoteAttachment $machineNoteAttachment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, MachineNoteAttachment $machineNoteAttachment)
    {
        $machineNoteAttachment->delete();

        return redirect()->route('machineNoteAttachment.index');
    }
}
