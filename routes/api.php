<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Task;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post','TaskController@index');
Route::post('/post','TaskController@store');
Route::delete('/post/{id}','TaskController@destroy');

Route::put('/post','TaskController@store');

// List articles
//Route::get('articles', 'ArticleController@index');

// List single article
//Route::get('article/{id}', 'ArticleController@show');
