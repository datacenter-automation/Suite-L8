<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadStoreRequest;
use App\Http\Requests\UploadUpdateRequest;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $uploads = Upload::all();

        return view('upload.index', compact('uploads'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('upload.create');
    }

    /**
     * @param \App\Http\Requests\UploadStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UploadStoreRequest $request)
    {
        $upload = Upload::create($request->validated());

        $request->session()->flash('upload.id', $upload->id);

        return redirect()->route('upload.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Upload       $upload
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Upload $upload)
    {
        return view('upload.show', compact('upload'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Upload       $upload
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Upload $upload)
    {
        return view('upload.edit', compact('upload'));
    }

    /**
     * @param \App\Http\Requests\UploadUpdateRequest $request
     * @param \App\Models\Upload                     $upload
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UploadUpdateRequest $request, Upload $upload)
    {
        $upload->update($request->validated());

        $request->session()->flash('upload.id', $upload->id);

        return redirect()->route('upload.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Upload       $upload
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Upload $upload)
    {
        $upload->delete();

        return redirect()->route('upload.index');
    }
}
