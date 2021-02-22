<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoftwareStoreRequest;
use App\Http\Requests\SoftwareUpdateRequest;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $software = Software::all();

        return view('software.index', compact('software'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('software.create');
    }

    /**
     * @param \App\Http\Requests\SoftwareStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SoftwareStoreRequest $request)
    {
        $software = Software::create($request->validated());

        $request->session()->flash('software.id', $software->id);

        return redirect()->route('software.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Software     $software
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Software $software)
    {
        return view('software.show', compact('software'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Software     $software
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Software $software)
    {
        return view('software.edit', compact('software'));
    }

    /**
     * @param \App\Http\Requests\SoftwareUpdateRequest $request
     * @param \App\Models\Software                     $software
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SoftwareUpdateRequest $request, Software $software)
    {
        $software->update($request->validated());

        $request->session()->flash('software.id', $software->id);

        return redirect()->route('software.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Software     $software
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Software $software)
    {
        $software->delete();

        return redirect()->route('software.index');
    }
}
