<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TopTenPage;
use App\Movie;

class TopTenController extends Controller
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

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        $title = "Edit Top Ten";

        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

        return view( 'admin.pages.top-ten' )->withTitle( $title )->withTopten( $topten );
    }


    public function update(Request $request)
    {
        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

		    $topten->heading = !empty( $request->input( 'heading' ) ) ? $request->input( 'heading' ) : '';

		    $topten->save();

        return redirect( 'admin/top-ten' );
    }

    public function destroy($id)
    {
        //
    }

    public function move( $id )
    {
        $movie = Movie::find( $id );

        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

        $topten->movies()->syncWithoutDetaching( [ $movie->id => ['sort' => 0] ] );

        return redirect( 'admin/movies' );
    }
}
