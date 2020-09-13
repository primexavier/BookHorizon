<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Blog;
use App\Model\Chart;
use App\Model\Wishlist;
use App\Model\Bank;
use App\Model\PaymentMethod;
use App\Model\TransactionType;

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
        if(!Auth::User()){
            return response("login", 200)->header('Content-Type', 'text/plain');
        }
        if(!Book::find($request->id)){
            return response($request->id, 500)->header('Content-Type', 'text/plain');
        }
        $addChart = new Chart;
        $addChart->book_id = $request->id;
        $addChart->user_id = Auth::User()->id;
        $addChart->transaction_type_id = 1;
        $addChart->save();
        if(!$addChart){
            return response($request->id, 500)->header('Content-Type', 'text/plain');
        }else{
            return response($request->id, 200)->header('Content-Type', 'text/plain');
        }
    }

    public function addWishlist(Request $request)
    {
        if(!Auth::User()){
            return response("login", 200)->header('Content-Type', 'text/plain');
        }
        if(!Book::find($request->id)){
            return response($request->id, 500)->header('Content-Type', 'text/plain');
        }
        $addChart = new Wishlist;
        $addChart->book_id = $request->id;
        $addChart->user_id = Auth::User()->id;
        $addChart->save();
        if(!$addChart){
            return response($request->id, 500)->header('Content-Type', 'text/plain');
        }else{
            return response($request->id, 200)->header('Content-Type', 'text/plain');
        }
    }

    public function chart()
    {
        if(Auth::User()){
            $transactionTypes = TransactionType::get();
            $chart = Chart::where("user_id", Auth::User()->id)->get();
            return view("frontend.chart")
            ->with("transactionTypes",$transactionTypes)
            ->with("charts",$chart);
        }else{
            return redirect(route("login"));
        }
    }

    public function wishlist()
    {
        if(Auth::User()){
            $wishlist = Wishlist::where("user_id", Auth::User()->id)->get();
            return view("frontend.wishlist")
            ->with("wishlists",$wishlist);
        }else{
            return redirect(route("login"));
        }
    }

    public function bookModal(Book $book)
    {
        return $book;
    }

    public static function getProvince($province_id){        
        $curl = curl_init();
        if($province_id){
            $province = "?id=".$province_id;
        }else{
            $province = "";
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province".$province,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "key: 106e7050f0400a42b414fb308db9dc00"
            ),
          ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return null;
        } else {
            return json_decode($response)->rajaongkir->results;
        }
    }

    public function getCity($provinceId, $cityId = NULL){   
        if($provinceId){
            $province = "?province=".$provinceId;
        }else{
            $province = "";
        }     
        if($cityId){
            $province = $province."&id=".$cityId;
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city".$province,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "key: 106e7050f0400a42b414fb308db9dc00"
            ),
          ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return null;
        } else {
            if($cityId){
                $response = str_replace(chr(0), '', $response);
                $contents = utf8_encode($response);
                $results = json_decode($contents);
                return response()->json([$results->rajaongkir->results]);
            }else{
                return json_decode($response)->rajaongkir->results;
            }
        }
    }

    public function searchBook(Request $request){   
        $searchedBook = Book::where('title', 'like', '%'.$request->searchBook.'%')->get();
        return view('frontend.search')
        ->with("searchBooks",$searchedBook);
    }

    public function paymentMethodList(PaymentMethod $paymentmethod){
        $banks = Bank::get();
    
        return view('frontend.payment-method')
        ->with("banks", $banks);
    }
}
