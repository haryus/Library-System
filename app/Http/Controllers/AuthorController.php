<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("authors.index");
    }

    public function data_authors()
    {
        $authors = Author::query();
        return Datatables::of($authors)
        ->addColumn('action', function ($author) {
            $actionset = '';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-author" data-toggle="modal" data-id="'.$author->id.'""><i class="icon-pencil7"></i></a>';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-author" data-toggle="modal" data-id="'.$author->id.'""><i class="icon-trash"></i></a>';
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
    public function store(AuthorRequest $request)
    {
        Author::create($request->all());
        return redirect()->back()->with('success','Author has been added!');
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
    public function edit(Author $author)
    {
        return $author;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->back()->with('success','Author has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->back()->with('success','Author have been deleted!');
    }
}
