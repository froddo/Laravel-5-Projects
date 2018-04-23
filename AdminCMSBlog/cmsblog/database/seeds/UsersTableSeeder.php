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
       $user =  App\User::create([
            'name' => 'Rumen Topalov',
            'email' => 'topalovr@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/about2.jpg',
            'about' => 'This is about my profile face',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
