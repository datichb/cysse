<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;
use App\collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();

        return view('collections.index', compact('collections'));
    }

    public function create()
    {
        $paintings = Painting::all();//->where('id_col', '=', NULL)

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('public_img')->get($value->name.'.txt');
        }
        
        return view('collections.create', compact('paintings'));
    }

    public function show(Collection $collection)
    {
        $paintings = Painting::all()->where('id_col', '=', $collection->id);

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('public_img')->get($value->name.'.txt');
        }

        $collection->paintings = $paintings;
        $collection->paints = array();
        return view('collections.show', compact('collection'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $var = Collection::create([
            'name' => request('name'),
            'description' => request('description')
         ]);

         foreach(request('paints') as $key => $value) {
             if(Painting::select('id')->where('id', '=', $key) != null) {
                 Painting::where('id', $value)->update(['id_col' => $var->id]);
             }
         }

         return $request->all();
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
