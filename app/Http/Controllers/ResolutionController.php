<?php

namespace App\Http\Controllers;

use App\Resolution;
use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resolutions = Resolution::orderBy('title','asc')->get();
        return view('admin.resolutions.index', compact(['resolutions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resolutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $resolution = new Resolution();
        $resolution->title = $request->title;
        $resolution->save();

        return redirect('resolutions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function show(Resolution $resolution)
    {
        // REDIRECT TO INDEX
        return redirect('resolutions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function edit(Resolution $resolution)
    {
        return view('admin.resolutions.edit', compact(['resolution']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resolution $resolution)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $resolution->title = $request->title;
        $resolution->save();

        return redirect('resolutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resolution = Resolution::findOrFail($id);
        $resolution->delete();
        return redirect('resolutions');
    }
}
