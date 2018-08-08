<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::all();

        return view('paintings.index', compact('paintings'));
    }

    public function create()
    {
        return view('paintings.create');
    }

    public function show(Painting $painting)
    {
        return view('paintings.show', compact('painting'));
    }

    public function store(Request $request)
    {
        Storage::disk('public_img')->put(request('name').'.jpg', request('file'));

        $this->validate($request, [
            'name' => 'required|max:50',
            'width' => 'required|max:50',
            'height' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        return Painting::create([
            'name' => request('name'),
            'width' => request('width'),
            'height' => request('height'),
            'description' => request('description')
         ]);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
