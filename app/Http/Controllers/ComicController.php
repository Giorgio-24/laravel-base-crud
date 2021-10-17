<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'unique', 'string', 'min:4', 'max:200'],
            'description' => ['required', 'string', 'min:4'],
            'thumb' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999.99'],
            'series' => ['required', 'string', 'min:4'],
            'sale_date' => ['required', 'date', 'before:tomorrow', 'size:10'],
            'type' => ['required', 'string', 'min:4', 'max:100']
        ], [
            'required' => 'You must fill the :attribute field!', //^:attribute riesce a leggere il nome dell' attributo
            'unique' => 'The :attribute field must be unique!',
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

        $request->validate([
            'title' => ['required', Rule::unique('comics')->ignore($comic->id), 'string', 'min:4', 'max:200'],
            'description' => ['required', 'string', 'min:4'],
            'thumb' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999.99'],
            'series' => ['required', 'string', 'min:4'],
            'sale_date' => ['required', 'date', 'before:tomorrow', 'size:10'],
            'type' => ['required', 'string', 'min:4', 'max:100']
        ], [
            'required' => 'You must fill the :attribute field!', //^:attribute riesce a leggere il nome dell' attributo
            'unique' => 'The :attribute field must be unique!',
            'string' => 'You must insert a string!',
            'numeric' => 'You must insert a number!',
            'min' => 'The value is too short!',
            'max' => 'The value is too long!',
            'date' => 'You must insert a valid date! (es: 2021-10-14)',
            'sale_date.before' => 'You must insert a not future date!',
            'sale_date.size' => 'You must insert a 10 carachters date! (es: 2021-10-14)',
            'title.unique' => "The comic $request->title already exists!"
        ]);

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
