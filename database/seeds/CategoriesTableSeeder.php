<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Category::create([
        'name' => 'Environment'
      ]);
      App\Category::create([
        'name' => 'Transportation'
      ]);
      App\Category::create([
        'name' => 'Public'
      ]);
      App\Category::create([
        'name' => 'Hazard'
      ]);
      App\Category::create([
        'name' => 'Soil'
      ]);
    }
}
