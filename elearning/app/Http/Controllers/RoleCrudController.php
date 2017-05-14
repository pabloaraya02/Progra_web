<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Role;

class RoleCrudController extends Controller
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
        $roles = Role::orderBy('id_role','desc')->get();
        return view('roles.roleIndex',compact('roles'));

        //
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
        $role = DB::table('role')->where('id_role',$id)->get();
        $users = Role::find($id)->users;
        return view('roles.roleShow',compact('role','users'));
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
        $this->validate($request, [
            'name' => 'required|alpha_num|min:3|max:32',
            'status' => 'required'
        ]);

        $userToUpdate = Role::findOrFail($id);
        //$resourceUpdate = $request->all();
        $userToUpdate->update($request->all());
        $theRoleID = $request->input('id_role');  
        
        //$userToUpdate->roles()->attach($theRoleID,['status' => 1]);

        return redirect('user')->with('success','User updated successfully');
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
        $role = Role::find($id);
        
        //detach roles
        //se quitan todos los roles que pertenecen al role numero $id
        $role->users()->detach();
        //se borra el role
        $role->delete();
        return redirect('role');
    }
}
