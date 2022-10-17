<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/vue', 'VueController@index')->name('post.vue');


Route::post('/post/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::post('/post', 'PostController@store')->name('post.store');
Route::delete('/post/{id}', 'PostController@destroy')->name('post.destroy');


//Route::group(['middleware' => ['admin']], function () {
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
//->middleware('admin');
//});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
