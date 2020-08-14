<?php

namespace App\Http\Controllers;

use App\Model\Genre;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\GenreDataTable;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GenreDataTable $dataTable)
    {
        return $dataTable->render('backend.genre.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.genre.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('genres', [
            'genre' => ['required', 'unique:genres', 'max:255']
        ]);
        $new = new Genre();
        $new->genre = $request->genre;
        $new->parent_id = $request->parent;
        $new->save();
        
        return redirect()->route("backend.genre.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view("backend.genre.detail")->with("genre",$genre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return redirect()->route("backend.genre.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
