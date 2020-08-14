<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Blog;
use App\Model\Chart;

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
        ->with("bookDetail",$book);
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
    public function checkout()
    {
        return view('frontend.index');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addChart(Request $request)
    {
        $addChart = new Chart;
        $addChart->book_id = $request->id;
        $addChart->user_id = Auth::User()->id;
        $addChart->transaction_type = 1;
        $addChart->save();
        if(!$addChart){
            return response($request->id, 500)
                      ->header('Content-Type', 'text/plain');
        }else{
            return response($request->id, 200)
                      ->header('Content-Type', 'text/plain');
        }
    }
}
