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
          'site_name' => 'GeoCMS',
          'contact_number' => '0000 000 000',
          'contact_email' => 'info@geocms.com',
          'address' => 'Thessaloniki, Greece',
        ]);
    }
}
