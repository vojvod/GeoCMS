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
        $user = App\User::create([
          'name' => 'Simeon Taskaris',
          'email' => 'simos.taskaris@gmail.com',
          'password' => bcrypt('taskaris'),
          'admin' => 1
        ]);

        App\Profile::create([
          'user_id' => $user->id,
          'avatar' => 'uploads/avatars/1.jpg',
          'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat aliquet pulvinar. Vivamus a molestie dolor.',
          'facebook' => 'facebook.com',
          'youtube' => 'youtube.com'
        ]);
    }
}
