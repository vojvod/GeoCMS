<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/////

Route::get('/test', function () {
    return App\Map::find(1)->category;
});



/////

Route::get('/', [
  'uses' => 'FrontEndController@index',
  'as' => 'index'
]);

Route::get('/map/{slug}', [
  'uses' => 'FrontEndController@singleMap',
  'as' => 'map.single'
]);

Auth::routes();

Route::group(['prefix' => 'admin'], function(){

  Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
  ]);

  Route::get('/services', [
    'uses' => 'ServicesController@index',
    'as' => 'services'
  ])->middleware('viewer');

  Route::get('/service/create', [
    'uses' => 'ServicesController@create',
    'as' => 'service.create'
  ])->middleware('viewer');

  Route::post('/service/store', [
    'uses' => 'ServicesController@store',
    'as' => 'service.store'
  ])->middleware('viewer');

  Route::get('/service/edit/{id}', [
    'uses' => 'ServicesController@edit',
    'as' => 'service.edit'
  ])->middleware('viewer');

  Route::get('/service/delete/{id}', [
    'uses' => 'ServicesController@destroy',
    'as' => 'service.delete'
  ])->middleware('viewer');

  Route::post('/service/update/{id}', [
    'uses' => 'ServicesController@update',
    'as' => 'service.update'
  ])->middleware('viewer');

  Route::get('/service/trashed', [
    'uses' => 'ServicesController@trashed',
    'as' => 'service.trashed'
  ])->middleware('viewer');

  Route::get('/service/kill/{id}', [
    'uses' => 'ServicesController@kill',
    'as' => 'service.kill'
  ])->middleware('viewer');

  Route::get('/service/restore/{id}', [
    'uses' => 'ServicesController@restore',
    'as' => 'service.restore'
  ])->middleware('viewer');

  Route::get('/category/create', [
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
  ])->middleware('viewer');

  Route::get('/categories', [
    'uses' => 'CategoriesController@index',
    'as' => 'categories'
  ])->middleware('viewer');

  Route::post('/category/store', [
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
  ])->middleware('viewer');

  Route::get('/category/edit/{id}', [
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
  ])->middleware('viewer');

  Route::get('/category/delete/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete'
  ])->middleware('viewer');

  Route::post('/category/update/{id}', [
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
  ])->middleware('viewer');

  Route::get('/maps', [
    'uses' => 'MapsController@index',
    'as' => 'maps'
  ]);

  Route::get('/maps/trashed', [
    'uses' => 'MapsController@trashed',
    'as' => 'map.trashed'
  ])->middleware('viewer');

  Route::get('/maps/kill/{id}', [
    'uses' => 'MapsController@kill',
    'as' => 'map.kill'
  ])->middleware('viewer');

  Route::get('/maps/restore/{id}', [
    'uses' => 'MapsController@restore',
    'as' => 'map.restore'
  ])->middleware('viewer');

  Route::get('/maps/edit/{id}', [
    'uses' => 'MapsController@edit',
    'as' => 'map.edit'
  ])->middleware('viewer');

  Route::post('/maps/update/{id}', [
    'uses' => 'MapsController@update',
    'as' => 'map.update'
  ])->middleware('viewer');

  Route::get('/map/create', [
    'uses' => 'MapsController@create',
    'as' => 'map.create'
  ])->middleware('viewer');

  Route::post('/map/store', [
    'uses' => 'MapsController@store',
    'as' => 'map.store'
  ])->middleware('viewer');

  Route::get('/map/delete/{id}', [
    'uses' => 'MapsController@destroy',
    'as' => 'map.delete'
  ])->middleware('viewer');

  Route::get('/tags', [
    'uses' => 'TagsController@index',
    'as' => 'tags'
  ])->middleware('viewer');

  Route::get('/tag/create', [
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
  ])->middleware('viewer');

  Route::post('/tag/store', [
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
  ])->middleware('viewer');

  Route::get('/tag/edit/{id}', [
    'uses' => 'TagsController@edit',
    'as' => 'tag.edit'
  ])->middleware('viewer');

  Route::post('/tag/update/{id}', [
    'uses' => 'TagsController@update',
    'as' => 'tag.update'
  ])->middleware('viewer');

  Route::get('/tag/delete/{id}', [
    'uses' => 'TagsController@destroy',
    'as' => 'tag.delete'
  ])->middleware('viewer');

  Route::get('/users', [
    'uses' => 'UsersController@index',
    'as' => 'users'
  ])->middleware('viewer', 'editor');

  Route::get('/user/create', [
    'uses' => 'UsersController@create',
    'as' => 'user.create'
  ])->middleware('viewer', 'editor');

  Route::post('/user/store', [
    'uses' => 'UsersController@store',
    'as' => 'user.store'
  ])->middleware('viewer', 'editor');

  Route::get('/user/admin/{id}', [
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
  ])->middleware('viewer');

  Route::get('/user/editor/{id}', [
    'uses' => 'UsersController@editor',
    'as' => 'user.editor'
  ])->middleware('viewer', 'editor');

  Route::get('/user/viewer/{id}', [
    'uses' => 'UsersController@viewer',
    'as' => 'user.viewer'
  ])->middleware('viewer', 'editor');

  Route::get('/user/profile', [
    'uses' => 'ProfilesController@index',
    'as' => 'user.profile'
  ]);

  Route::post('/user/profile/update', [
    'uses' => 'ProfilesController@update',
    'as' => 'user.profile.update'
  ]);

  Route::get('/user/delete/{id}', [
    'uses' => 'UsersController@destroy',
    'as' => 'user.delete'
  ])->middleware('viewer', 'editor');

  Route::get('/settings', [
    'uses' => 'SettingsController@index',
    'as' => 'settings'
  ])->middleware('viewer', 'editor');

  Route::post('/settings/update', [
    'uses' => 'SettingsController@update',
    'as' => 'settings.update'
  ])->middleware('viewer', 'editor');

});
