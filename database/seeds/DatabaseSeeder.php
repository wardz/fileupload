<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 6)->create();

        factory(App\User::class, 10)->create()->each(function($user) {
            $user->permissions()->save(factory(App\Permission::class)->make());
            // permissions()->user()-> ?
            
            $user->projects()->save(factory(App\Project::class)->make());
            $user->projects()->tags()->save(factory('projectTag')->make());
            $user->projects()->files()->save(factory(App\File::class)->make());
        });
    }
}
