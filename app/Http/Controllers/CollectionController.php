<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;
use App\collection;
use App\collection_type;
use App\Paint_on_col;


/**
 * @resource Collection
 *
 * Class use to define Collection object and information.
 */
class CollectionController extends Controller
{
    /**
	 * The index method.
	 *
	 * This method is use to generate the collection view information.
     * 
     * <aside class="notice">
     *  You must replace `meowmeowmeow` with your personal API key.
     * </aside>
	 *
	 */
    public function index()
    {
        $collection = Collection::all()->first();

        $collection->paint_on_col()->with(['paint'])->get();
        $paint = array();

        foreach($collection->paint_on_col as $key => $value){
            array_push($paint, $value->paint()->get()[0]);
        }
        $collection->paint = $paint;
        
        foreach ($collection->paint as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }
        
        $collection->img = Storage::disk('collection_img')->get($collection->name.'.txt');
        $collection->paints = array();
        
        $nbCollection = Collection::select('id')->get()->values();

        foreach ($nbCollection as $key => $value) {
            $value->icon = Storage::disk('collection_icon')->get($value->id.'.txt');
        }

        return view('collections.index', compact('collection', 'nbCollection'));
    }

    /**
	 * The getAll method.
	 *
	 * This method is use to get all of the painting information from all of the painting in the DB.
     * 
     * @routes paiting/getAll
	 *
	 */
    public function getAll() {
        $collections = Collection::all();
        
        return compact('collections');
    }

    public function create()
    {
        $paintings = Painting::all()->where('id_col', '=', NULL);

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }

        $paintings = $paintings->values();

        $type = Collection_type::all();
        return view('collections.create', compact('paintings', 'type'));
    }

    public function show(Request $request)
    {
        $collection = Collection::all()->where('id', request('id'))->first();
        
        $collection->paint_on_col()->with(['paint'])->get();
        $paint = array();

        foreach($collection->paint_on_col as $key => $value){
            array_push($paint, $value->paint()->get()[0]);
        }
        $collection->paint = $paint;
        
        foreach ($collection->paint as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }
        
        $collection->img = Storage::disk('collection_img')->get($collection->name.'.txt');
        $collection->paints = array();

        return compact('collection');
    }

    /**
	 * The store method.
	 *
	 * This method is use to store a collection with all its related painting in DB.
     * 
     * @routes paiting/getAll
	 *
	 */
    public function store(Request $request)
    {
        Storage::disk('collection_img')->put(request('name').'.txt', request('file'));

        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $var = Collection::create([
            'name' => request('name'),
            'description' => request('description'),
            'type' => request('coltype')
        ]);

        Storage::disk('collection_icon')->put($var->id.'.txt', request('iconfile'));

        foreach(request('paints') as $key => $value) {
            Paint_on_col::create([
                'id_paint' => $value,
                'id_col' => $var->id
            ]);
        }

        return $request->all();
    }

    public function deletepainting(Request $request){
        Painting::where('id', request('painting'))->update(['id_col' => NULL]);

        return;
    }

    public function addpainting(Request $request){

        foreach(request('checkedpainting') as $key => $value) {
            Painting::where('id', $value)->update(['id_col' => request('collection')]);   
        }

        return;
    }

    public function delete(Request $request)
    {
        Paint_on_col::where('id_col', request('id'))->delete();

        $name = Collection::select('name')->where('id', request('id'))->get();

        Storage::disk('painting_img')->delete($name[0]->name.'.txt');
        Collection::where('id', request('id'))->delete();
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
