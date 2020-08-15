<?php

namespace App\Http\Controllers;

use App\Model\Membership;
use Illuminate\Http\Request;
use App\DataTables\MembershipDataTable;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MembershipDataTable $dataTable)
    {
        return $dataTable->render('backend.membership.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.membership.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('memberships', [
            'name' => ['required'],
            'price' => ['required'],
            'duration' => ['required']
        ]);
        $new = new Membership();
        $new->name = $request->name;
        $new->duration = $request->duration;
        $new->price = $request->price;
        $new->description = $request->desc;
        if($new->save()){
            return redirect()->route('backend.membership.index');
        }else{
            return redirect()->route('backend.membership.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        return view("backend.membership.detail")->with("membership",$membership);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        return view("backend.membership.edit")->with("membership",$membership);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        return $membership;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        if($membership){
            $membership->delete();
            return redirect()->route("backend.membership.index");
        }else{                
            return redirect()->route("backend.membership.index");
        }
    }
}
