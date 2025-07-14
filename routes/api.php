<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MessageController;

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

Route::get('/hello-world', function () {
    return 'Hello World ~';
});

//查詢所有的留言
Route::get("/messages","MessageController@getAllMessages");
//找到特定的留言
Route::get("/messages/{content}","MessageController@getByContent");
//新增留言
Route::post("/messages/create/{name}/{content}","MessageController@createMessage");
//修改留言
Route::put("/messages/update/{id}","MessageController@updateMessages");
//刪除留言
Route::delete("messages/delete/{id}","MessageController@deleteMessages");
//找到特定id的留言
Route::get("/messages/id/{id}","MessageController@getById");
