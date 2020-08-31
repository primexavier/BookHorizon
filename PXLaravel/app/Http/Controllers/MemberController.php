<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Transaction;
use App\Model\Download;
use App\Model\Bill;
use App\Model\Payment;
use App\Model\PaymentMethod;
use App\Model\Address;
use App\Model\Membership;
use App\Model\Wishlist;
use App\Model\Chart;
use Illuminate\Http\Request;
use App\DataTables\MemberDataTable;
use App\DataTables\OrdersDataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(MemberDataTable $dataTable)
    {
        return $dataTable->render('backend.member.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('users', [
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'unique:users']
        ]);
        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->first_name = $request->name;
        $new->last_name = $request->last_name;
        $new->display_name = $request->display_name;
        $new->privacy = $request->privacy;
        $new->password = Hash::make($request->password);
        $new->level = 2;
        if($new->save()){
            return redirect()->route('backend.member.index');
        }else{
            return redirect()->route('backend.member.index');
        }
    }

    /*
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
       return view("backend.member.add");
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $softDelete = User::where('id',$id)->first();
        if($softDelete){
            if($softDelete->level == 2){
                $softDelete->delete();
                return redirect()->route("backend.member.index");
            }else{                
                return redirect()->route("backend.member.index");
            }
        }else{
            return redirect()->route("backend.member.index");
        }
    }    

    public function profile()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();

        return view('frontend.profile.myprofile')->with('userDetail', $user);
    }

    public function orderlist()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $transaction = Transaction::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.order')
        ->with('transaction', $transaction)
        ->with('userDetail', $user);
    }

    public function downloadList()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $download = Download::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.download')
        ->with('download', $download)
        ->with('userDetail', $user);
    }

    public function billList()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $bill = Bill::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.bill')
        ->with('bill', $bill)
        ->with('userDetail', $user);
    }

    public function paymentList()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $payment = Payment::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.payment')
        ->with('payment', $payment)
        ->with('userDetail', $user);
    }

    public function addressList()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $address = Address::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.address')
        ->with('address', $address)
        ->with('userDetail', $user);
    }

    public function paymentMethod()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        $bill = Bill::where('user_id',Auth::User()->id)->get();
        return view('frontend.profile.payment-method')
        ->with('paymentMethod', $bill)
        ->with('userDetail', $user);
    }

    public function editProfile()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        return view('frontend.profile.editprofile')
        ->with('userDetail', $user);
    }

    public function privacy()
    {
        $userID = Auth::id();
        $user = User::where('id',$userID)->first();
        return view('frontend.profile.privacy')
        ->with('userDetail', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("backend.member.detail")->with("member",$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("backend.member.edit")->with("member",$user);
    }

    public function becomeMember(User $user)
    {
        $memberships = Membership::get();
        return view("frontend.profile.become")
        ->with("memberships",$memberships)
        ->with("userDetail",$user);
    }

    public function extendMember(User $user)
    {
        $memberships = Membership::get();
        return view("frontend.profile.extend")
        ->with("memberships",$memberships)
        ->with("userDetail",$user);
    }

    public function wishlistChart(Request $request){
        if($request->wishlistId){
            $wishlist = Wishlist::where("user_id",$request->wishlistId)->first();
            if($wishlist){
                $newChart = new Chart;
                $newChart->user_id = Auth::User()->id;
                $newChart->book_id = $wishlist->book_id;
                $newChart->transaction_type = 1;
                if($newChart->save()){
                    $wishlist->delete();
                }
            }
        }

        return redirect(route("wishlist"));
    }

    public function checkout(Request $request)
    {
        $charts = Chart::where("user_id",Auth::user()->id)->get();
        $paymentMethods = PaymentMethod::get();
        $address = Address::where("user_id",Auth::user()->id)->first();
        $provinces = FrontEndController::getProvince(NULL);
        return view("frontend.checkout")
        ->with("charts",$charts)
        ->with("paymentMethods",$paymentMethods)
        ->with("address",$address)
        ->with("provinces",$provinces);
    }

    public function deleteChart(Chart $chart)
    {        
        if($chart->delete()){
            return redirect()->route("chart");
        }
    }

    public function pay(Request $request)
    {        
        
        return redirect()->route("transaction.detail",1);
    }

    public function transactionDetail($transaction)
    {        
        $transaction = "";
        return view("frontend.transaction-detail")->with("transaction",$transaction);

    }
}
