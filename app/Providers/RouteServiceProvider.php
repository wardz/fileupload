<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use App\Project;
use App\File;
use App\Tag;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $duration = config('project.remember_long');
        $offset = config('project.paginate');

        // Find Project by name (slug)
        Route::bind('project', function($name) use($duration) {
            return Project::remember($duration)
                ->where('name', '=', str_slug($name, ' '))
                ->firstOrFail();
        });

        Route::bind('fileID', function($id) use($duration) {
            return File::remember($duration)->findOrFail($id);
        });

        Route::bind('projects', function($tags) use($offset, $duration) {
            if ($tags === 'all') {
                return Project::remember($duration)->paginate($offset);
            }

            // Find project(s) by tag name(s)
            return Project::remember($duration)
                ->whereHas('tags', function($q) use ($tags) {
                    $q->whereIn('name', str_getcsv($tags));
                })->paginate($offset);
        });

        /*Route::filter('sortBy', function($route, $request, $values) {
            dd($values);
        });*/
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
