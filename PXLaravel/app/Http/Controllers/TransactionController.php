<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use App\Model\TransactionBook;
use App\Model\TransactionMembership;
use App\Model\TransactionShipping;
use App\Model\Bill;
use Illuminate\Http\Request;
use App\DataTables\TransactionDataTable;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render("backend.transaction.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.transaction.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view("backend.transaction.add");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $bill = Bill::where('transaction_id',$transaction->id)->first();
        $transactionBook = TransactionBook::where('transaction_id',$transaction->id)->get();
        $transactionMember = TransactionMembership::where('transaction_id',$transaction->id)->get();
        $transactionShipping = TransactionShipping::where('transaction_id',$transaction->id)->first();
        return view("backend.transaction.detail")
        ->with('transaction',$transaction)
        ->with('transactionBook',$transactionBook)
        ->with('transactionMember',$transactionMember)
        ->with('transactionShipping',$transactionShipping)
        ->with('bill',$bill);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view("backend.transaction.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('backend.transactions.index');
    }

    public function approveReceipt(Transaction $transaction){
        $bill = Bill::where('transaction_id',$transaction->id)->first();
        $bill->status = 2;
        $bill->save();
        $transaction->status = 4;
        $transaction->save();
        return redirect()->route('backend.transactions.detail',$transaction->id);
    }

    public function addShipping(Request $request, Transaction $transaction){
        $newShippingTransaction = new TransactionShipping;
        $newShippingTransaction->shipping_code = $request->shippingCode;
        $newShippingTransaction->transaction_id = $transaction->id;
        $newShippingTransaction->status = 0;
        $newShippingTransaction->save();

        $transaction->status = 5;
        $transaction->save();
        
        return redirect()->route('backend.transactions.detail',$transaction->id);
    }

    public function finishTransaction(Transaction $transaction){        
        $transaction->status = 6;
        $transaction->save();
        return redirect()->route('backend.transactions.detail',$transaction->id);
    }

    public function declineReceipt (Transaction $transaction){         
        $bills = Bill::where('transaction_id',$transaction->id)->first();
        $bills->photo = "";
        $bills->status = 1;
        $bills->save();        
        $transaction->status = 1;
        $transaction->save();
        return redirect()->route('backend.transactions.detail',$transaction->id);
    }
}
