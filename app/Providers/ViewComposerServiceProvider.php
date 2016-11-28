<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Tag;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('project.form', function($view) {
            $view->with('tags', Tag::remember(10)->pluck('name', 'id')->all());
        });

        /*view()->composer('project.index', function($view) {
            $view->with('projects', Tag::remember(10)->pluck('name', 'id')->all());
        });*/
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
