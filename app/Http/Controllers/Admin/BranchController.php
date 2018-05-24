<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Http\Requests\Admin\BranchFormRequest;

class BranchController extends Controller
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
       $branches = Branch::all();

       $title = 'Manage Branchs';

       return view( 'admin.branches.branches' )->withBranches( $branches )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Branch";

      return view( 'admin.branches.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchFormRequest $request)
    {
      $branch = new Branch();

      $branch->name = !empty($request->input('name')) ? $request->input('name') : '';
      $branch->email = !empty($request->input('email')) ? $request->input('email') : '';
      $branch->contact_number = !empty($request->input('contact_number')) ? $request->input('contact_number') : '';
      $branch->address = !empty($request->input('address')) ? $request->input('address') : '';

      $branch->save();

      return redirect('admin/add-branch');
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
    public function edit( $id )
    {
      $title = "Edit Branch";

      $branch = Branch::find( $id );

      return view( 'admin.branches.edit' )->withTitle( $title )->withBranch( $branch );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchFormRequest $request)
    {
      $branch = Branch::find($request->input('id'));

      $branch->name = !empty($request->input('name')) ? $request->input('name') : '';
      $branch->email = !empty($request->input('email')) ? $request->input('email') : '';
      $branch->contact_number = !empty($request->input('contact_number')) ? $request->input('contact_number') : '';
      $branch->address = !empty($request->input('address')) ? $request->input('address') : '';

      $branch->save();

      return redirect('admin/branches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $branch = Branch::find($id);

      $branch->delete();

      return redirect('admin/branches');
  }

}
