<?php

use Illuminate\Database\Seeder;

use App\Tag;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $map = App\Map::create([
        'title' => 'Test Map 1',
        'slug' => str_slug('Test Map 1'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget commodo lorem. Integer quis tortor sed neque posuere posuere non vitae nibh.',
        'category_id' => 1,
        'featured' => 'uploads/maps/'
      ]);

      $map->tags()->attach(1);

      $map = App\Map::create([
        'title' => 'Test Map 2',
        'slug' => str_slug('Test Map 2'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget commodo lorem. Integer quis tortor sed neque posuere posuere non vitae nibh.',
        'category_id' => 1,
        'featured' => 'uploads/maps/'
      ]);

      $map->tags()->attach(1);

      $map = App\Map::create([
        'title' => 'Test Map 3',
        'slug' => str_slug('Test Map 3'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget commodo lorem. Integer quis tortor sed neque posuere posuere non vitae nibh.',
        'category_id' => 1,
        'featured' => 'uploads/maps/'
      ]);

      $map->tags()->attach(1);

    }
}
