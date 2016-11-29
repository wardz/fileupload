<?php

use Storage;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name->unique(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'role_id' => $faker->numberBetween(0, 3)
        // user_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word->unique()
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define('ProjectTag', function (Faker\Generator $faker) {
    return [
        'tag_id' => $faker->numberBetween(0, 5)
        // project_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word->unique(),
        'description' => $faker->paragraph,
        // user_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\File::class, function (Faker\Generator $faker) {
	$name = $faker->word . '.zip';
	$path = Storage::put($name, 'test');

    return [
        'file_name' => $name,
        'file_version' => 'v' . $faker->numberBetween(1, 9),
        'file_changelog' => $faker->paragraph,
        'file_mime' => 'application/zip',
        'file_path' => $path,
        'file_size' => $faker->numberBetween(1024, 10240),
        // project_id
    ];
});
