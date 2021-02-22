<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationGroupStoreRequest;
use App\Http\Requests\LocationGroupUpdateRequest;
use App\Models\LocationGroup;
use Illuminate\Http\Request;

class LocationGroupController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $locationGroups = LocationGroup::all();

        return view('locationGroup.index', compact('locationGroups'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('locationGroup.create');
    }

    /**
     * @param \App\Http\Requests\LocationGroupStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LocationGroupStoreRequest $request)
    {
        $locationGroup = LocationGroup::create($request->validated());

        $request->session()->flash('locationGroup.id', $locationGroup->id);

        return redirect()->route('locationGroup.index');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\LocationGroup $locationGroup
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, LocationGroup $locationGroup)
    {
        return view('locationGroup.show', compact('locationGroup'));
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\LocationGroup $locationGroup
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, LocationGroup $locationGroup)
    {
        return view('locationGroup.edit', compact('locationGroup'));
    }

    /**
     * @param \App\Http\Requests\LocationGroupUpdateRequest $request
     * @param \App\Models\LocationGroup                     $locationGroup
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LocationGroupUpdateRequest $request, LocationGroup $locationGroup)
    {
        $locationGroup->update($request->validated());

        $request->session()->flash('locationGroup.id', $locationGroup->id);

        return redirect()->route('locationGroup.index');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\LocationGroup $locationGroup
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, LocationGroup $locationGroup)
    {
        $locationGroup->delete();

        return redirect()->route('locationGroup.index');
    }
}
