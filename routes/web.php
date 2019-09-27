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
})->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/profile', function(){
    return view('home');
})->middleware('auth');

// Route::middleware(['role:ADMIN', 'role:INSTRUCTOR', 'role:STUDENT'])->group(function () {
//     Route::get('/files/{id}', 'FileController@show')->name('files.show')->middleware('auth');

// });

Route::get('/files/{id}', 'FileController@show')->name('files.show')->middleware('auth');


Route::get('/start', 'ViewFileController@index')->middleware('auth');
Route::post('/files/{id}/forward', 'FileController@forward')->name('forward');


Route::get('/admin', 'ViewFileController@index')->middleware('auth');

Route::group(['middleware' => ['role:ADMIN']], function () {

    Route::get('/instructors/import_teaches', 'InstructorController@importTeachesView');
    Route::post('/instructors/import_teaches', 'InstructorController@importTeaches')->name('import_teaches');
    
    

    Route::resource('/instructors', 'InstructorController')->middleware('auth');
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    Route::post('/students/import_takes', 'StudentController@importTakes')->name('import_takes');
    Route::get('/students/import_takes', 'StudentController@importTakesView');

    Route::post('/students/import_student', 'StudentController@importStudents')->name('import_student');


    // Route::resource('files', 'FileController')->middleware('auth');
    

    Route::resource('students', 'StudentController')->middleware('auth');



    Route::post('/courses/import_courses', 'CourseController@importCourses')->name('import_courses');

    Route::resource('courses', 'CourseController')->middleware('auth');

    Route::post('/departments/import_departments', 'DepartmentController@importCourses')->name('import_departments');


    Route::resource('departments', 'DepartmentController')->middleware('auth');

    
});

Route::group(['middleware' => ['role:STUDENT']], function () {
    
    Route::get('/shared', 'FileController@sharedFile')->middleware('auth');



});

Route::group(['middleware' => ['role:INSTRUCTOR']], function () {
    Route::resource('files', 'FileController')->middleware('auth');
});



Route::get('/starter', function () {
    return "working";
})->middleware('role:ADMIN');


// Route::post('/students/import_takes', 'StudentController@importTakes')->name('import_takes');

// Route::post('/students/import_student', 'StudentController@importStudents')->name('import_student');

// Route::resource('files', 'FileController')->middleware('auth');

// Route::resource('students', 'StudentController')->middleware('auth');
