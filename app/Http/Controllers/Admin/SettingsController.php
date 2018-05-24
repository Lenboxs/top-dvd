<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsFormRequest;
use App\Helpers\UploadService;

use App\Settings;
use App\SocialMedia;

class SettingsController extends Controller
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
    public function store( SettingsFormRequest $request )
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $title = "Manage Settings";

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        return view( 'admin.pages.settings' )->withTitle( $title )->withSettings( $settings )->withSocialmedia( $social_media );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( SettingsFormRequest $request, UploadService $uploadService )
    {
        $setting = Settings::orderBy( 'id', 'desc' )->first();

        $setting->heading = !empty($request->input('heading')) ? $request->input('heading') : '';

        $status = true;

    		if( $request->input( 'remove_logo' ) == 'true' )
    		{
    			   $setting->logo = '';
    		}
        elseif( !empty( $request->file( 'logo' ) ) )
    		{
    			   $setting->logo = $this->upload( 'logo', $request, $uploadService );

    			   $status = $uploadService->successful();
    		}

    		if( $status )
    		{
    			   $setting->save();
    		}

        return redirect('admin/settings');
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

    public function upload( $input, $request, $uploadService )
    {
        if( !empty( $request->file( $input ) ) )
        {
            if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/settings' )->move() )
            {
              return $uploadService->getTargetFile();
            }

            $this->status = $this->status && $uploadService->successful();
        }
        elseif( $request->input( 'remove_' . $input ) == 'true' )
        {
             return '';
        }
    }
}
