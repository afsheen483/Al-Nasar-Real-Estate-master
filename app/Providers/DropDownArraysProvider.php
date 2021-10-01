<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class DropDownArraysProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $view->with('location_array',DB::table('locations')->where('is_deleted','=',0)->get());
            });
            view()->composer('*',function($view){
                $view->with('phase_array',DB::table('phases')->where('is_deleted','=',0)->get());
                });
                view()->composer('*',function($view){
                    $view->with('mauza_array',DB::table('mauzas')->where('is_deleted','=',0)->get());
                    });
                    view()->composer('*',function($view){
                        $view->with('client_array',DB::table('clients')->where('is_deleted','=',0)->get());
                        });
                        view()->composer('*',function($view){
                            $view->with('purchase_array',DB::table('purchase')->where('is_deleted','=',0)->get());
                            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
