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

// Route::get('hello/{id?}/{pass?}','HelloController@index');

// Route::get('hello',function(){
//     return view('hello.index');
// });



Route::get('hello/{id?}','HelloController@index');

Route::post('hello','HelloController@post');

Route::get('/quiz/{id}', 'QuestionController@index')->name('quiz.id');

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/question/display/{id}', 'AdminController@display')->name('admin.question.display');
Route::get('/editDisplay/{question_id}', 'AdminController@editDisplay')->name('editDisplay');

Route::post('/store/{id}', 'AdminController@store')->name('store');
Route::post('/delete/{question_id}', 'AdminController@delete')->name('delete');
Route::post('/edit/{question_id}', 'AdminController@edit')->name('edit');
Route::post('/big_add', 'AdminController@big_add')->name('big_add');
Route::post('/big_delete', 'AdminController@big_delete')->name('big_delete');
