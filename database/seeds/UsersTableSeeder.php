<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'foto' => '1539482267.jpg',
            'level' => 'admin',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'foto' => '1539482267.jpg',
            'level' => 'user',
            'password' => bcrypt('user')
        ]);
    }
}
