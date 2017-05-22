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
use App\Course;
use App\Resource;
use App\Week;

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



Route::resource('user', 'UserCrudController');
Route::resource('course', 'CourseCrudController');
Route::resource('role', 'RoleCrudController');
Route::resource('resource', 'ResourceCrudController');
Route::resource('week', 'weekCrudController');
Route::get('resource/create/{courseId?}/{weekId?}',"ResourceCrudController@create");

Route::get('upload', function () {
    return view('pages.upload');
});

Route::post('upload/upload', 'ResourceCrudController@upload');


/*Route::resource('user', 
	['middleware' => 'auth',
	 'uses' => 'UserCrudController']);*/

//Route::get('/destroy/{id}', 'ResourceCrudController@destroy');

/*Llama a la pagina para subir un video desde el equipo*/
Route::get('uploadVideo/{id_course}/{id_week}/{id_resource}', function ($id_course,$id_week,$id_resource) {
	$course = Course::find($id_course);
	$week = Week::find($id_week);
	$resource = Resource::find($id_resource); 
    return view('upload.upload',compact('course','week','resource'));
});

/*Llama a la pagina para descargar un video al equipo*/
Route::get('downloadVideo/', function () {
    return view('download');
});

/*Llama a la pagina para reproducir el video*/
Route::get('showVideo/', function () {
    return view('showVideo');
});


/*Llama al metodo que sube los videos del repositorio local al repositorio del WS*/
Route::post('upload/{id_course}/{id_week}/{id_resource}', 'WSController@upload');

/*Llama al metodo que descarga los videos del WS al navegador*/
Route::post('download/', 'WSController@download');

/*Llama al metodo que se encarga de reproducir los videos*/
Route::post('play/', 'WSController@play');

Route::get('get-video/{video}', 'WSController@getVideo')->name('getVideo');