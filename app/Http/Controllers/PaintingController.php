<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CardUpdated;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\painting;

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
        return view('paintings.create');
    }

    public function show(Painting $painting)
    {
        $painting->image = Storage::disk('painting_img')->get($painting->name.'.txt');

        return view('paintings.show', compact('painting'));
    }

    public function store(Request $request)
    {
        Storage::disk('painting_img')->put(request('name').'.txt', request('file'));
        

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
        $paintings = array();

        foreach(request('id') as $key => $value) {
            array_push($painting, Painting::all()->where('id', $value));
        }

        $paintings = $paintings->values();
        compact('paintings');
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
