<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "Laravel Blog",
            'about' => 'Zdraveite',
            'address' => 'Sofia, Bulgaria',
            'address_info' => 'Europe',
            'contact_number' => '0897 647 465',
            'number_info' => 'Mon-Sun 8am-23pm',
            'contact_email' => 'topalovr@gmail.com',
            'email_info' => 'online support'
        ]);
    }
}
