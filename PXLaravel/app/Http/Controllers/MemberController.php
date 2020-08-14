<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\DataTables\MemberDataTable;
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

        return view('frontend.profile.index')->with('userDetail', $user);
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
}
