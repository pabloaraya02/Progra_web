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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/managment', 'controllerTest@index');


Route::get('/managment', ['middleware' => 'checkAdmin:"Admin"', function () {
    //$user = App\User::find(Auth::id());
    $user = App\User::find(Auth::id());
    return view('dashboard',compact('user'));
}])->name('managment');


Route::get('/destroy/{id}', 'ResourceCrudController@destroy');
Route::post('/store2','ResourceCrudController@store2');

Route::resource('user', 'UserCrudController');
Route::resource('course', 'CourseCrudController');
Route::resource('role', 'RoleCrudController');
Route::resource('resource', 'ResourceCrudController');
Route::resource('week', 'weekCrudController');
Route::get('resource/create/{courseId?}/{weekId?}',"ResourceCrudController@create");


/*Route::resource('user', 
	['middleware' => 'auth',
	 'uses' => 'UserCrudController']);*/

