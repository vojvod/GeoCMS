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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

  Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
  ]);

  Route::get('/services', [
    'uses' => 'ServicesController@index',
    'as' => 'services'
  ]);

  Route::get('/service/create', [
    'uses' => 'ServicesController@create',
    'as' => 'service.create'
  ]);

  Route::post('/service/store', [
    'uses' => 'ServicesController@store',
    'as' => 'service.store'
  ]);

  Route::get('/category/create', [
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
  ]);

  Route::get('/categories', [
    'uses' => 'CategoriesController@index',
    'as' => 'categories'
  ]);

  Route::post('/category/store', [
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
  ]);

  Route::get('/category/edit/{id}', [
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
  ]);

  Route::get('/category/delete/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete'
  ]);

  Route::post('/category/update/{id}', [
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
  ]);

  Route::get('/maps', [
    'uses' => 'MapsController@index',
    'as' => 'maps'
  ]);

  Route::get('/maps/trashed', [
    'uses' => 'MapsController@trashed',
    'as' => 'map.trashed'
  ]);

  Route::get('/maps/kill/{id}', [
    'uses' => 'MapsController@kill',
    'as' => 'map.kill'
  ]);

  Route::get('/maps/restore/{id}', [
    'uses' => 'MapsController@restore',
    'as' => 'map.restore'
  ]);

  Route::get('/maps/edit/{id}', [
    'uses' => 'MapsController@edit',
    'as' => 'map.edit'
  ]);

  Route::post('/maps/update/{id}', [
    'uses' => 'MapsController@update',
    'as' => 'map.update'
  ]);

  Route::get('/map/create', [
    'uses' => 'MapsController@create',
    'as' => 'map.create'
  ]);

  Route::post('/map/store', [
    'uses' => 'MapsController@store',
    'as' => 'map.store'
  ]);

  Route::get('/map/delete/{id}', [
    'uses' => 'MapsController@destroy',
    'as' => 'map.delete'
  ]);

  Route::get('/tags', [
    'uses' => 'TagsController@index',
    'as' => 'tags'
  ]);

  Route::get('/tag/create', [
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
  ]);

  Route::post('/tag/store', [
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
  ]);

  Route::get('/tag/edit/{id}', [
    'uses' => 'TagsController@edit',
    'as' => 'tag.edit'
  ]);

  Route::post('/tag/update/{id}', [
    'uses' => 'TagsController@update',
    'as' => 'tag.update'
  ]);

  Route::get('/tag/delete/{id}', [
    'uses' => 'TagsController@destroy',
    'as' => 'tag.delete'
  ]);

  Route::get('/users', [
    'uses' => 'UsersController@index',
    'as' => 'users'
  ]);

  Route::get('/user/create', [
    'uses' => 'UsersController@create',
    'as' => 'user.create'
  ]);

  Route::post('/user/store', [
    'uses' => 'UsersController@store',
    'as' => 'user.store'
  ]);

  Route::get('/user/admin/{id}', [
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
  ])->middleware('admin');

  Route::get('/user/not-admin/{id}', [
    'uses' => 'UsersController@not_admin',
    'as' => 'user.not.admin'
  ])->middleware('admin');

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
    ]);

});
