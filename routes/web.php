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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('files', 'FileController');

Route::resource('students', 'StudentController');

Route::get('/test', function(){
    return Auth::user()->userable;
});
//multi-auth for normal users, admins and teachers

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm');

Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');

Route::get('/admin', 'AdminController@index');
Route::get('/teacher', 'TeacherController@index');


Route::get('/starter', function () {
    return view('starter');
});
