<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoftwareInstalledStoreRequest;
use App\Http\Requests\SoftwareInstalledUpdateRequest;
use App\Models\SoftwareInstalled;
use Illuminate\Http\Request;

class SoftwareInstalledController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $softwareInstalleds = SoftwareInstalled::all();

        return view('softwareInstalled.index', compact('softwareInstalleds'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('softwareInstalled.create');
    }

    /**
     * @param \App\Http\Requests\SoftwareInstalledStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SoftwareInstalledStoreRequest $request)
    {
        $softwareInstalled = SoftwareInstalled::create($request->validated());

        $request->session()->flash('softwareInstalled.id', $softwareInstalled->id);

        return redirect()->route('softwareInstalled.index');
    }

    /**
     * @param \Illuminate\Http\Request      $request
     * @param \App\Models\SoftwareInstalled $softwareInstalled
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, SoftwareInstalled $softwareInstalled)
    {
        return view('softwareInstalled.show', compact('softwareInstalled'));
    }

    /**
     * @param \Illuminate\Http\Request      $request
     * @param \App\Models\SoftwareInstalled $softwareInstalled
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, SoftwareInstalled $softwareInstalled)
    {
        return view('softwareInstalled.edit', compact('softwareInstalled'));
    }

    /**
     * @param \App\Http\Requests\SoftwareInstalledUpdateRequest $request
     * @param \App\Models\SoftwareInstalled                     $softwareInstalled
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SoftwareInstalledUpdateRequest $request, SoftwareInstalled $softwareInstalled)
    {
        $softwareInstalled->update($request->validated());

        $request->session()->flash('softwareInstalled.id', $softwareInstalled->id);

        return redirect()->route('softwareInstalled.index');
    }

    /**
     * @param \Illuminate\Http\Request      $request
     * @param \App\Models\SoftwareInstalled $softwareInstalled
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, SoftwareInstalled $softwareInstalled)
    {
        $softwareInstalled->delete();

        return redirect()->route('softwareInstalled.index');
    }
}
