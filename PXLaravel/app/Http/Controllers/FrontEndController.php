<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Blog;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booklist = Book::get();
        $spesialOffers = Book::inRandomOrder()->limit(5)->get();
        return view("index")
        ->with("booklist",$booklist)
        ->with("spesialOffers",$spesialOffers);
    }

    public function bookDetail($id)
    {
        $booklist = Book::limit(6)->get();        
        $book = Book::where('id',$id)->first();
        if(!$book){
            abort(404);
        }
        return view("frontend.book.detail")
        ->with("booklist",$booklist)
        ->with('book',$book);
    }

    public function blogIndex()
    {
        $blogList = Blog::get();
        return view("frontend.blog.index")
        ->with("blogList",$blogList);
    }
    
    public function blogDetail($id)
    {
        $blog = Blog::where('id',$id)->first();
        if(!$blog){
            abort(404);
        }
        return view("frontend.blog.detail")
        ->with('blog',$blog);
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
