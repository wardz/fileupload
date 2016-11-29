<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

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

            // Create X amount of projects for current user
            for ($i = 0, $n = rand(1, 5); $i < $n; $i++) {
                $project = $user->projects()->save(factory(App\Project::class)->make());
                $project->tags()->attach([
                    rand(1, 6), rand(1, 6), rand(1, 6)
                ]);

                // Create X amount of files for project
                for ($j = 0, $m = rand(1, 4); $j < $m; $j++) {
                    $project->files()->save(factory(App\File::class)->make(['project_id' => $project->id]));
                }
            }
        });

        // Create an admin user for easier testing
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('admin'),
        ]);
        $user->permissions()->save(App\Permission::create([
            'role_id' => 3, 'user_id' => $user->id,
        ]));
    }
}
