<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\Sale;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('stockQuantity', '>' ,0)->get();
        return view("sales.index", compact("books"));
    }

    public function data_sales()
    {
        $sales = Sale::query()->with('book:id,title');
        return Datatables::of($sales)
        ->addColumn('action', function ($sale) {
            $actionset = '';
            // $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-sale" data-toggle="modal" data-id="'.$sale->id.'""><i class="icon-pencil7"></i></a>';
            // $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-sale" data-toggle="modal" data-id="'.$sale->id.'""><i class="icon-trash"></i></a>';
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
    public function store(SaleRequest $request)
    {
        Sale::create($request->all());
        $book = Book::where('id', $request->bookID)->first();
        if($book){
            $book->stockQuantity -= $request->quantity;
            $book->save();
        }
        return redirect()->back()->with('success','Sale has been added!');
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
    public function edit(Sale $sale)
    {
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $sale->update($request->all());
        return redirect()->back()->with('success','sale has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->back()->with('success','Sale have been deleted!');
    }
}
