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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/hello-world/{name}",function($name){
//     return 'hello ~ ' . $name;
// });

// // Route::get("/test",function(){
// //     return view("test");
// // });

// Route::get('/test/{name}', function ($name) {
//     return view('test', ['name' => $name]);
// });

// Route::get("/trivia/{id}","TriviaController@trivia");

Route::get("/",function(){
    return view("hello-world");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
