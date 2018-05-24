<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Impl\UploadServiceImpl;

class UploadServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( 'App\Helpers\UploadService', function(){

            return new UploadServiceImpl();

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Helpers\UploadService'];
    }
}