<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\StudentController;


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
//Route::get('test1',[PagesController::class,'index']);

//Route::get('test2',[PagesController::class,'second']);
Route::resource('comment', CommentController::class);
Route::get('api/comments',[CommentsController::class,'index']);

Route::post('api/comments/search',[CommentsController::class,'search']);

//Route::resource('api/student', StudentController::class);
Route::post('api/student',[PagesController::class,'students']);
Route::post('api/student/search', [PagesController::class,'search']);

Route::any('{slug}',function(){
return view('welcome');
});
