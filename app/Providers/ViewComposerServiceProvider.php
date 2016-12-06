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
        $duration = config('project.remember_short');
        $blacklist = config('breadcrumb.blacklist');

        // Make sure these views always have $tags
        view()->composer(['project.form', 'projects.index'], function($view) use($duration) {
            $view->with('tags', Tag::remember($duration)->pluck('name', 'id')->all());
        });

        // Inject config variables to breadcrumb
        view()->composer('layouts.breadcrumb', function($view) use($blacklist) {
            $view->with([
                'url' => url('/'),
                $blacklist
            ]);
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
