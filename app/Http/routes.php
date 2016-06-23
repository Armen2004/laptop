<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.landing');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'user'], function () {


    Route::group(['middleware' => 'auth:user'], function () {

        Route::get('/', function () {

        });

    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',], function () {

    Route::get('login', 'AdminController@login');
    Route::post('login', 'AdminController@login');
    Route::get('register', 'AdminController@register');
    Route::post('register', 'AdminController@register');

    Route::get('logout', 'AdminController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/', function () {
            return redirect('admin/dashboard');
        });
        
        Route::get('dashboard', 'DashboardController@index');

        Route::resource('pages', 'PagesController');
        
        Route::resource('contents', 'ContentsController');
        
    });
});

// Templates

Route::get('{templates}/{template}', array(function ($templates, $template) {
    $template = str_replace(".blade.php", "", $template);
//        view()->addExtension('html', 'php');
    return view($templates . '.' . $template)->render();
}));
