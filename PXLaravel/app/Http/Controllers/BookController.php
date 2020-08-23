<?php

namespace App\Http\Controllers;

use App\Model\Book;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataTables\BookDataTable;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render('backend.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.book.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('books', [
            'title' => ['required', 'unique:books', 'max:255']
        ]);
        $new = new Book();
        $new->author_id = $request->authors_id;
        $new->title = $request->title;
        $new->isbn = $request->isbn;
        $new->publication_city = $request->pcity;
        $new->format = $request->format;
        $new->product_code = $request->pcode;
        $new->pages = $request->pages;
        $new->dimension = $request->dimension;
        $new->weight = $request->weight;
        $new->vendor = $request->vendor;
        $new->purchase_price = $request->pprice;
        $new->start_qty = $request->qty;
        $book->price = $request->price;
        $new->description = $request->desc;
        if ($request->hasFile('photo')) {
            $new->photo = $request->file('photo')->getClientOriginalName();
        }
        $new->save();
        return redirect()->route("backend.book.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("backend.book.detail")->with("book",$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view("backend.book.edit")->with("book",$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if($request->title != $book->title){
            $validatedData = $request->validateWithBag('books', [
                'title' => ['required', 'unique:books', 'max:255']
            ]);           
        }
        $book->author_id = 1; //$request->authors_id;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->publication_city = $request->pcity;
        $book->format = $request->format;
        $book->product_code = $request->pcode;
        $book->pages = $request->pages;
        $book->dimension = $request->dimension;
        $book->weight = $request->weight;
        $book->vendor = $request->vendor;
        $book->purchase_price = $request->pprice;
        $book->price = $request->price;
        $book->start_qty = $request->qty;
        $book->description = $request->desc;
        if ($request->hasFile('photo')) {
            $book->photo = $request->file('photo')->getClientOriginalName();
        }
        if($book->save()){
            return redirect(route("backend.book.detail",$book->id));
        }else{            
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

    }

    public function importExcel(Request $request)
    {
        Excel::import(new BookImport, "book.xlsx");
        
        return redirect('/backend/books')->with('success', 'All good!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        if($book){
            $book->delete();
            return redirect()->route("backend.book.index");
        }else{
            return redirect()->route("backend.book.index");
        }
    }    

}
