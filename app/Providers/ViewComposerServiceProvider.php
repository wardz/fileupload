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

        // Make sure these views always have $tags
        view()->composer(['project.form', 'projects.show'], function($view) use($duration) {
            $view->with('tags', Tag::remember($duration)->pluck('name', 'id')->all());
        });

        // Inject config variables to breadcrumb
        view()->composer('layouts.breadcrumb', function($view) {
            $view->with([
                'url' => url('/'),
                'blacklist' => [/*'login' => 1*/]
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
