<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view("books.index", compact("authors","genres"));
    }

    public function data_books()
    {
        $books = Book::query()
        ->with(['genre' => function($query) {
            $query->withTrashed()->select('id', 'genre');
        }])
        ->with(['author' => function($query) {
            $query->withTrashed()->select('id', 'name');
        }]);
        return Datatables::of($books)
        ->addColumn('img', function ($book) {
            if($book->img){
                return '<img src="'.asset($book->img).'" alt="Book Image" class="img-thumbnail" style="max-width:100px; max-height:100px;">';
            } else {
                return 'No image';
            }
        })
        ->addColumn('action', function ($book) {
            $actionset = '';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-book" data-toggle="modal" data-id="'.$book->id.'""><i class="icon-pencil7"></i></a>';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-book" data-toggle="modal" data-id="'.$book->id.'""><i class="icon-trash"></i></a>';
            return $actionset;
        })
            ->rawColumns(['img', 'action'])
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
    public function store(BookRequest $request)
    {
        $data = $request->except(['img']);
        if($request->hasFile('img')) {
            try {
                $imageName = $request->file('img')->store('public/images');
                $imageURL = Storage::url($imageName);
                $data['img'] = $imageURL;
            } catch (\Exception $e) {
                Log::error('Error uploading image:'.$e->getMessage());
                return redirect()->back()->with('error','Error creating book!');
            }
        }
        try {
            Book::create($data);
            return redirect()->back()->with('success','Book has been added!');
        } catch (\Exception $e) {
            \Log::error('Error creating book:'.$e->getMessage());
            return redirect()->back()->with('error','Error creating book!');
        }
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
    public function edit(Book $book)
    {
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->except('img'));
        if($request->hasFile('img')){
            try {
                $this->deleteOldImage($book);
                $imageName = $request->file('img')->store('public/images');
                $imageURL = Storage::url($imageName);
                $book->img = $imageURL;
                $book->save();
            } catch (\Exception $e) {
                \Log::error('Error uploading image.'.$e->getMessage());
                return redirect()->back()->with('error','Error uploading image');
            }
        }
        return redirect()->back()->with('success','Book has been updated.');
    }

    private function deleteOldImage(Book $book)
    {
        if($book->img){
            Storage::delete($book->img);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('success','Book has been deleted!');
    }
}
