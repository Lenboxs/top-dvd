<?php

namespace App\Helpers;

Interface UploadService
{
    public function setRequest( $request );

    public function setFilename( $filename = "" );

    public function setMaxSize( $max_size = 0 );

    public function setAllowedMimeTypes( $extentions );

    public function getTargetFile();

    public function setUploadDirectory( $upload_dir = "", $force = false );

    public function move();
}