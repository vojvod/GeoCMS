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
          'name' => 'Simeon Taskaris',
          'email' => 'simos.taskaris@gmail.com',
          'password' => bcrypt('taskaris')
        ]);
    }
}
