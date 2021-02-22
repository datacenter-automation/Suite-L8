<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoftwareCategoryStoreRequest;
use App\Http\Requests\SoftwareCategoryUpdateRequest;
use App\Models\SoftwareCategory;
use Illuminate\Http\Request;

class SoftwareCategoryController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $softwareCategories = SoftwareCategory::all();

        return view('softwareCategory.index', compact('softwareCategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('softwareCategory.create');
    }

    /**
     * @param \App\Http\Requests\SoftwareCategoryStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SoftwareCategoryStoreRequest $request)
    {
        $softwareCategory = SoftwareCategory::create($request->validated());

        $request->session()->flash('softwareCategory.id', $softwareCategory->id);

        return redirect()->route('softwareCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\SoftwareCategory $softwareCategory
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, SoftwareCategory $softwareCategory)
    {
        return view('softwareCategory.show', compact('softwareCategory'));
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\SoftwareCategory $softwareCategory
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, SoftwareCategory $softwareCategory)
    {
        return view('softwareCategory.edit', compact('softwareCategory'));
    }

    /**
     * @param \App\Http\Requests\SoftwareCategoryUpdateRequest $request
     * @param \App\Models\SoftwareCategory                     $softwareCategory
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SoftwareCategoryUpdateRequest $request, SoftwareCategory $softwareCategory)
    {
        $softwareCategory->update($request->validated());

        $request->session()->flash('softwareCategory.id', $softwareCategory->id);

        return redirect()->route('softwareCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request     $request
     * @param \App\Models\SoftwareCategory $softwareCategory
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, SoftwareCategory $softwareCategory)
    {
        $softwareCategory->delete();

        return redirect()->route('softwareCategory.index');
    }
}
