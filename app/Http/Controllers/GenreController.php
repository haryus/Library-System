<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use Yajra\Datatables\Datatables;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("genres.index");
    }

    public function data_genres()
    {
        $genres = Genre::query();
        return Datatables::of($genres)
        ->addColumn('action', function ($genre) {
            $actionset = '';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-genre" data-toggle="modal" data-id="'.$genre->id.'""><i class="icon-pencil7"></i></a>';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-genre" data-toggle="modal" data-id="'.$genre->id.'""><i class="icon-trash"></i></a>';
            return $actionset;
        })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        Genre::create($request->all());
        return redirect()->back()->with('success','Genre has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return $genre;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->all());
        return redirect()->back()->with('success','Genre has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->back()->with('success','Genre have been deleted!');
    }
}
