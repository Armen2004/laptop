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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

//    Route::get('login', 'AdminController@login');
//    Route::post('login', 'AdminController@login');
//    Route::get('register', 'AdminController@register');
//    Route::post('register', 'AdminController@register');
//    Route::get('logout', 'AdminController@logout');

        //Login Routes...
        Route::get('login','Auth\AuthController@showLoginForm');
        Route::post('login','Auth\AuthController@login');
        Route::get('logout','Auth\AuthController@logout');

        // Registration Routes...
        Route::get('register', 'Auth\AuthController@showRegistrationForm');
        Route::post('register', 'Auth\AuthController@register');

        Route::get('/', function (){
            return redirect('admin/dashboard');
        });


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::resource('profile', 'AdminController', [ 'only' => ['index', 'edit', 'update'] ]);
        Route::get('dashboard', 'DashboardController@index');

        Route::resource('pages', 'PagesController');

        Route::resource('contents', 'ContentsController');

        Route::resource('user-types', 'UserTypesController');

        Route::resource('posts', 'PostsController', [ 'except' => ['show'] ]);
        Route::get('posts/{slug}', 'PostsController@show')->where('slug', '[A-Za-z0-9-_]+');

        Route::resource('members', 'MembersController');

        Route::resource('lesson-types', 'LessonTypesController');

        Route::resource('courses', 'CoursesController', [ 'except' => ['show'] ]);
        Route::get('courses/{slug}', 'CoursesController@show')->where('slug', '[A-Za-z0-9-_]+');

        Route::resource('lessons', 'LessonsController', [ 'except' => ['show'] ]);
        Route::post('lessons/course', 'LessonsController@getCourse');
        Route::get('lessons/{course}/{lesson}', 'LessonsController@show');

    });
});

// Templates
Route::group(['prefix' => 'templates'], function () {
    
    Route::get('{folder}/{page}', array(function ($folder, $page) {
        $page = str_replace(".blade.php", "", $page);
//        view()->addExtension('html', 'php');
        return view('templates.' . $folder . '.' . $page)->render();
    }));
    
});