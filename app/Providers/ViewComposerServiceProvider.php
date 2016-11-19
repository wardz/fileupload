<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*view()->composer('addon.form', function($view) {
            $view->with('files', Addon::all());
        });*/

        // TODO move this array to config
        view()->composer('layouts.footer', function($view) {
            $view->with('languages', array(
                [
                    'url' => '/lang/en',
                    'name' => 'English'
                ],
                [
                    'url' => '/lang/no',
                    'name' => 'Norwegian'
                ]
            ));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
