<?php

Route::group(['middleware' => 'web','namespace'  =>  'BeyondPlus\CmsLibrary\Controllers'], function () {
      Route::auth();

      Route::any('/register','Front\FrontController@index');
      Route::post('bp-admin/login','BpAdmin\Main@login_admin_post');
      Route::get('bp-admin/login', function(){
          return view('auth/adminlogin');
      });

      Route::group(['prefix' => 'bp-admin','namespace'  =>  'BpAdmin', 'middleware' => 'admins'], function () {

      Route::get('/', 'AdminController@index');
      Route::get('logout','Main@logout');

      Route::resource('post', 'PostController');
      Route::get('post/delete/{id}','PostController@destroy');

      Route::resource('page', 'PageController');
      Route::get('page/delete/{id}','PageController@destroy');

      Route::resource('user', 'UserController');
      Route::get('user/delete/{id}', 'UserController@destroy');

      Route::resource('media', 'MediaController');
      Route::get('media/delete/{id}','MediaController@destroy');

      Route::resource('slider', 'SliderController');
      Route::get('slider/delete/{id}','SliderController@destroy');

      Route::resource('menu', 'MenuController');
      Route::get('menu/delete/{id}','MenuController@destroy');
      Route::post('menu/pagestore', 'MenuController@pageStore');
      Route::post('menu/poststore', 'MenuController@postStore');

      Route::resource('category', 'CategoryController');
      Route::get('category/delete/{id}','CategoryController@destroy');

      Route::get('tax', 'TaxController@index');
      Route::get('tax/add', 'TaxController@create');
      Route::post('tax/add', 'TaxController@store');
      Route::get('tax/{id}', 'TaxController@edit');
      Route::put('tax/{id}','TaxController@update');
      Route::get('tax/delete/{id}','TaxController@destroy');

      Route::get('generals','SettingsController@index');
      Route::get('generals/add', 'SettingsController@generaledit');
      Route::post('generals/add', 'SettingsController@generaledit');


      Route::resource('account', 'AccountController');
      Route::get('account/delete/{id}', 'AccountController@destroy');
      Route::resource('new', 'CustomController');

      });

      Route::get('/', 'Front\FrontController@index');
      Route::get('/{name}', 'Front\FrontController@menu');
      Route::get('/detail/{name}', 'Front\FrontController@post');
      Route::get('/cat/{name}', 'Front\FrontController@cat');

      Route::get('/test', function(){
         return abort(404);
      });

  });
