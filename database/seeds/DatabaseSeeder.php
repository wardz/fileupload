<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

use App\Project;
use App\File;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO create file for addon1 & addon2
        // also move these to UserSeeder.php etc

        $user1 = User::create(array(
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('admin'),
            'role_id' => 3
        ));

        $project1 = Project::create(array(
            'name' => 'Project 1',
            'description' => 'Project description 10 characters.',
            'user_id' => $user1->id
        ));

        $user2 = User::create(array(
            'name' => 'guest',
            'email' => 'guest@localhost.com',
            'password' => bcrypt('guest')
        ));

        $project2 = Project::create(array(
            'name' => 'Project 2',
            'description' => 'Project description 10 characters.',
            'user_id' => $user2->id
        ));

        Tag::create(array('name' => 'Work'));
        Tag::create(array('name' => 'Cooking'));
        Tag::create(array('name' => 'Coding'));
    }
}
