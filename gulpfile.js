const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

elixir((mix) => {
		mix.sass('app.scss')
		.scripts(['app.js', 'tagselect.js', 'validate.js']);
       //.copy('resources/assets/js/app.js', 'public/js/app.js');

    //mix.scripts(['script1.js', 'script2.js'])
    //mix.version('public/css/app.css');
});
