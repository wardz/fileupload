<?php

use Illuminate\Support\Facades\Storage;

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
        'name' => $faker->unique()->word,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'ip_address' => (rand(1, 4) > 2) ? $faker->ipv4 : $faker->ipv6,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'role_name' => $faker->word
        // user_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->paragraph,
        'downloads' => $faker->randomDigit
        // user_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\File::class, function (Faker\Generator $faker, $args) {
    $id = $args['project_id'];
    $name = $faker->unique()->word . '.zip';
    Storage::put($id . '/' . $name, 'test');

    return [
        'file_name' => $name,
        'file_version' => 'v' . $faker->numberBetween(1, 9),
        'file_changelog' => $faker->paragraph,
        'file_mime' => 'application/zip',
        'file_size' => $faker->numberBetween(1024, 10240),
        'file_downloads' => $faker->randomDigit,
        // $name here should really be an UUID, but just for testing this'll do for now
        'file_path' => $id . '/' . $name,
        // project_id
    ];
});
