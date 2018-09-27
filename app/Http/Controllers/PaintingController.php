<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CardUpdated;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;
use App\plume;
use App\size;
use App\paint_price;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::all();

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }

        return view('paintings.index', compact('paintings'));
    }

    public function create()
    {
        $plumes = Plume::all();
        $sizes = Size::all();

        return view('paintings.create', compact('plumes', 'sizes'));
    }

    public function show(Painting $painting)
    {
        $painting->price()->with(['plume', 'size'])->get();
        
        foreach ($painting->price as $key => $value) {
            $value->size = $value->size()->get()[0];
            unset($value->id_size);
            $value->plume = $value->plume()->get()[0];
            unset($value->id_plume);
        }

        $painting->image = Storage::disk('painting_img')->get($painting->name.'.txt');

        return view('paintings.show', compact('painting'));
    }

    public function store(Request $request)
    {
        Storage::disk('painting_img')->put(request('name').'.txt', request('file'));
        

        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);
        
        $painting = Painting::create([
            'name' => request('name'),
            'description' => request('description')
        ]);
        
        foreach(request('Painttype') as $key => $value){
            $PaintPrice = Paint_price::create([
                'price' => $value['price'],
                'id_paint' => $painting->id,
                'id_plume' => $value['plume'],
                'id_size' => $value['size']
            ]);
        }

    }

    public function getFree() {
        $paintings = Painting::all()->where('id_col', NULL);

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }

        $paintings = $paintings->values();

        return compact('paintings');
    }

    public function buy(Request $request) {

        Painting::where('id', request('painting'))->update(['stock' => request('stock') - request('buy')]);

        event(
            (new CardUpdated(request('buy')))
        );
    }

    public function cart(Request $request) {
        $i = 0;
        $paintings = [];

        
        foreach(request('painting') as $key => $value) {
            $paintings[$i++] = Painting::all()->where('id', $value)->values()[0];
        }

        return compact('paintings');
    }

    public function modify() {
        $paintings = Painting::all();

        foreach ($paintings as $key => $value) {
            $value->image = Storage::disk('painting_img')->get($value->name.'.txt');
        }

        return view('paintings.modify', compact('paintings'));
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
