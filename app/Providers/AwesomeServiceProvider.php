<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AwesomeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //This share the value of key 'name' and 'property' to any view blade file.
        view()->share('commonVariable',[
            'name' => 'Common variable',
            'property' => 'This property is available in all your views'
        ]);
    }
}
