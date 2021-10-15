<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $string = 'create';
        $comic = new Comic();
        return view('comics.create', compact('comic', 'string'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required',  'string', 'min:4', 'max:200'],
            'description' => ['string', 'min:4'],
            'thumb' => ['string'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999.99'],
            'series' => ['string', 'min:4'],
            'sale_date' => ['date', 'before:tomorrow', 'size:10'],
            'type' => ['string', 'min:4', 'max:100']
        ], [
            'required' => 'You must insert a value!',
            'string' => 'You must insert a string!',
            'numeric' => 'You must insert a number!',
            'date' => 'You must insert a valid date! (es: 2021-10-14)',
            'sale_date.before' => 'You must insert a not future date!',
            'sale_date.size' => 'You must insert a 10 carachters date! (es: 2021-10-14)',
            'min' => 'The value is too short!',
            'max' => 'The value is too long!'
        ]);

        $data = $request->all();


        $comic = Comic::create($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {/* $comic = Comic::findOrFail($id); */

        $string = 'edit';
        return view('comics.edit', compact('comic', 'string'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->update($data);

        return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    public function trash()
    {
        $comics = Comic::onlyTrashed()->get();
        return view('comics.trash', compact('comics'));
    }

    public function restore($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->restore();
        return redirect()->route('comics.index');
    }

    public function permanentlyDelete($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->forceDelete();
        return redirect()->route('comics.index');
    }
}
