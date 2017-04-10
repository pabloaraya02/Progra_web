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
        //$availableRoles = DB::table('role')->get();
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
 /*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
       
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
        $theRoleID = $request->input('id_role');

        $theNewUser->roles()->attach($theRoleID,['status' => 1]);
        
        
        Session::flash('message', 'Resource Created Successfully!');
        return redirect('user');
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
        $user = User::find($id);
        $availableRoles = DB::table('role')->get();

        $userRoleID = 0;
        $userRoleName = "";
        foreach ($user->roles as $role) {
            $userRoleName = $role->name;
            $userRoleID = $role->id_role;
        }
        return view('user.userEdit',compact("user","availableRoles","userRoleName","userRoleID"));
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
        echo "HEEEYYY";
         $this->validate($request, [
            'name' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'id_role' => 'required'
        ]);

        $userToUpdate = User::findOrFail($id);
        //$resourceUpdate = $request->all();
        $userToUpdate->update($request->all());
        $theRoleID = $request->input('id_role');  
        
        $userToUpdate->roles()->attach($theRoleID,['status' => 1]);

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
        $user = User::find($id);
        
        //detach roles
        //se quitan todos los roles que pertenecen al user numero $id
        $user->roles()->detach();
        //se borra el user
        $user->delete();
        return redirect('user');
    }
}
