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



Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {

    //Login Routes...
    Route::post('login','UsersController@login');
    Route::get('logout','UsersController@logout');

    // Registration Routes...
    Route::post('register', 'UsersController@register');
    Route::post('check', 'UsersController@check');

    Route::group(['middleware' => 'auth:user'], function () {

        Route::post('getCourses', 'CoursesController@show');
        Route::post('getLesson', 'CoursesController@getLesson');
        Route::post('completeLesson', 'CoursesController@completeLesson');
        Route::post('getNextLesson', 'CoursesController@getNextLesson');
        Route::post('getPreviousLesson', 'CoursesController@getPreviousLesson');

        Route::post('getAllPosts', 'PostsController@all');
        Route::post('getPost', 'PostsController@show');
        Route::post('getNextPost', 'PostsController@getNextPost');
        Route::post('getPreviousPost', 'PostsController@getPreviousPost');

        Route::get('getCourses', 'CoursesController@shows');
        Route::get('/', function () {

        });

    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

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

Route::any('{catchall}', function () {
   return redirect('/');
})->where('catchall', '(.*)');