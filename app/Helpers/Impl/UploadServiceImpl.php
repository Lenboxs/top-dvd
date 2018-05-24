<?php

namespace App\Helpers\Impl;

use App\Helpers\UploadService;

class UploadServiceImpl implements UploadService
{

    private $request;

    /**
     * The name of the form field
     *
     * @var string
     */
    private $filename = '';
    
    /**
     * The name of the file
     *
     * @var string
     */
    private $target_file = '';

    /**
     * The size of the file
     *
     * @var int
     */
    private $file_size = 0;

    /**
     * The max size of the file
     *
     * @var int
     */
    private $max_size = 0;
    
    /**
     * The type of the file
     *
     * @var string
     */
    private $mime_Type = '';

    /**
     * Keeps the file extention
     *
     * @var string
     */
    private $file_ext = '';
    
    /**
     * The name of the directory to upload
     *
     * @var string
     */
    private $upload_dir = '';

    /**
     * Keeps all allowed extentions
     *
     * @var array
     */
    private $allowed_mimeTypes = array( "image/png", "image/jpeg", "image/jpg", "image/gif", "image/x-icon" );
	
	/**
     * Status of uploading the image
     *
     * @var boolean
     */
    private $success = false;
    
    /**
     * Array that keep all possible errors when upload
     *
     * @var array
     */
    private $upload_errors = array(
        UPLOAD_ERR_OK         => "No errors.",
        UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL    => "Partial upload.",
        UPLOAD_ERR_NO_FILE    => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
    );
    
    /**
     * Create an instance, optionally setting a starting point
     *
     * @access public
     */
    public function __construct()
    {
        
    }

    public function setRequest( $request )
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the field name
     *
     * @param string a string to set the name of the file
     */
    public function setFilename( $filename = "" )
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * Set the maximum size for the file
     *
     * @param int a int to set the maximum size of the file
     */
    public function setMaxSize( $max_size = 0 )
    {
        $this->max_size = $max_size;
        return $this;
    }

    /**
     * Set the field name
     *
     * @param string a string to set the name of the file
     */
    public function setAllowedMimeTypes( $extentions )
    {
        $this->allowed_mimeTypes = array();

        if( is_array( $extentions ) )
        {
            $this->allowed_mimeTypes = $extentions;
        }
         else
        {
            $this->allowed_mimeTypes = array( $extentions );
        }

        return $this;
    }
    
    /**
     * Returns the name of target file
     *
     * @return string returns the name of the target file
     * @see Upload::$target_file
     */
    public function getTargetFile()
    {
        return $this->target_file;
    }
    
    /**
     * Set the upload directory
     *
     * @param string a string to set the name of directory to upload to
     */
    public function setUploadDirectory( $upload_dir = "", $force = false )
    {
		if( empty( $this->upload_dir ) )
		{
			$this->upload_dir = $upload_dir;
		}

		if( $force )
		{
			$this->upload_dir = $upload_dir;
		}

        return $this;
    }
	
	/**
     * Returns the uploading status of target file
     *
     * @return boolean returns the status of this upload session
     * @see Upload::$success
     */
    public function successful()
    {
        return $this->success;
    }

    /**
     * Upload the file to img directory
     *
     * @return bool returns boolean on success of upload
     */
    public function move()
    {
        if( $this->request->hasFile( $this->filename ) )
        {
            if( $this->request->file( $this->filename )->isValid() )
            {
                /**
                 * Store the temporary name in the tmp_name variable
                 */
                $this->target_file = $this->request->file( $this->filename )->getClientOriginalName();

                /**
                 * Store the extension of the file in the file_ext variable
                 */
                $this->file_ext = $this->request->file( $this->filename )->getClientOriginalExtension();

                /**
                 * Store the size of the file in the file_size variable
                 */
                $this->file_size = $this->request->file( $this->filename )->getSize();

                /**
                 * Retrieve the mimeType of the file
                 */
                $this->mime_Type = $this->request->file( $this->filename )->getMimeType();

                $finfo = new \finfo( FILEINFO_MIME_TYPE );
                $fileContents = file_get_contents( $this->request->file( $this->filename ) );

                /**
                 * Check if the file contains code that escape to php in case of a backdoor comment
                 */
                if( strpos( $fileContents, '<?php' ) !== false )
                {
                    $this->mime_Type = "text/x-php";
                }
                else
                {
                    $this->mime_Type = strtolower( $finfo->buffer( $fileContents ) );
                }

                //var_dump($this->mime_Type);  exit;

                /**
                 * Check to see if the file extention is allowed
                 */
                if( !in_array( $this->mime_Type, $this->allowed_mimeTypes ) )
                { 
					flashy()->error( 'The type of file is not allowed.' );
					
                    return false;
                }
                else
                {
                    /**
                     * Move the uploaded file to the directory given by the upload_dir variable
                     *
                     * Returns true if successfully moved or returns array with errors if it failed
                     */
                    if( !$this->request->file( $this->filename )->move( $this->upload_dir, $this->target_file ) ) 
                    {
                        $error = $this->request->file( $this->filename )->getError();
						
						flashy()->error( $error );

                        return false;
                    }
                    else
                    {						
						$this->success = true;
						
                        return true;
                    }
                }
            }
            else
            {
				flashy()->error( 'The file is not valid.' );
				
                return false;
            }
        }
        else
        {
			flashy()->error( 'No file was founded.' );
			
            return false;
        }
    }

}