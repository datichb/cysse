<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();

        return view('collections.index', compact('collections'));
    }

    public function create()
    {
        $paintings = Painting::all();

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('public_img')->get($value->name.'.txt');
        }

        return view('collections.create', compact('paintings'));
    }

    public function show(Collection $collection)
    {
        return view('collections.show', compact('collection'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        return Collection::create([
            'name' => request('name'),
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
