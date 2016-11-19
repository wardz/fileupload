<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

use App\Addon;
use App\AddonFile;

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

        $addon1 = Addon::create(array(
            'name' => 'addon1',
            'description' => 'addon1 description 10 characters.',
            'category_id' => 1,
            'user_id' => $user1->id
        ));

        $user2 = User::create(array(
            'name' => 'guest',
            'email' => 'guest@localhost.com',
            'password' => bcrypt('guest')
        ));

        $addon2 = Addon::create(array(
            'name' => 'addon2',
            'description' => 'addon2 description 10 characters.',
            'category_id' => 1,
            'user_id' => $user2->id
        ));
    }
}
