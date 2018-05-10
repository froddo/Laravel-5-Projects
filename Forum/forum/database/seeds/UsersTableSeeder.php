<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'admin@forum.test',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name' => 'Ivan',
            'password' => bcrypt('password'),
            'email' => 'ivan@forum.test',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
