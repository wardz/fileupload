<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Storage;

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
        // TODO create seperate seed class for every model

        $user1 = User::create(array(
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('admin')
        ));

        $project1 = Project::create(array(
            'name' => 'Project 1',
            'description' => 'Project description 10 characters.',
            'user_id' => $user1->id
        ));

        //Storage::put('file1.zip', 'content');
        
        $file1 = File::create(array(
            'file_name' => 'file1.zip',
            'file_version' => 'v1',
            'file_changelog' => '10 character description',
            'file_mime' => 'application/zip',
            'file_path' => 'invalid/path/1.zip',
            'file_size' => '1234',
            'project_id' => 1
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

        $file2 = File::create(array(
            'file_name' => 'file2.zip',
            'file_version' => 'v1',
            'file_changelog' => '10 character description',
            'file_mime' => 'application/zip',
            'file_path' => 'invalid/path/2.zip',
            'file_size' => '10102',
            'project_id' => 2
        ));

        Tag::create(array('name' => 'Work'));
        Tag::create(array('name' => 'Cooking'));
        Tag::create(array('name' => 'Coding'));
    }
}
