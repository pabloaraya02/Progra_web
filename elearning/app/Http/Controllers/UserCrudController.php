<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;


class UserCrudController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdmin:"Admin"');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at','desc')->get();
        return view('user.userIndex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('role')->get();
        return view('user.userCreate', compact('roles'));
        
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

       
        $rules = array(
            'name' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'id_role' => 'required'

        );
        $this->validate($request, $rules);

        
        $user = $request->all();
        
        

        //$theNewUser = DB::table('users')->where('email', '=', $request()->email())->get();
        
        $theNewUser = User::create($user);
        $theNewUserID = $theNewUser->id_user;
        $theRoleID = $request->input();
        $theNewUser->roles()->attach($theNewUserID,['status' => 1]);
        
        
        Session::flash('message', 'Resource Created Successfully!');
        return redirect('managment');
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
