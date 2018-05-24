<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        $title = 'Manage User';

        return view( 'admin.users.users' )->withUsers( $user )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New User";

      return view( 'admin.users.add' )->withTitle( $title );
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
      $user = new Movie();

      $user->name = !empty($request->input('name')) ? $request->input('name') : '';
      $user->email = !empty($request->input('email')) ? $request->input('email') : '';
      $user->password = !empty($request->input('password')) ? $request->input('password') : '';


      $user->save();

      return redirect('admin/add-user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $title = "Edit User";

        $user = User::find( $id );

        $roles = Role::all();

        return view( 'admin.users.edit' )->withTitle( $title )->withUser( $user )->withRoles( $roles );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request )
    {
        $user = User::find($request->input('id'));

        $user->name = !empty($request->input('name')) ? $request->input('name') : '';
        $user->email = !empty($request->input('email')) ? $request->input('email') : '';

        if( $request->exists( 'password' ) )
        {
            $user->password = Hash::make( $request->input( 'password' ) );
        }

        $user->save();

        if( $request->exists( 'roles' ) )
        {
            $user->roles()->detach();

            $user->roles()->attach( $request->input( 'roles' ) );
        }

        return redirect('admin/users');
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

      $user->delete();

      return redirect('admin/users');
  }

}
