<?php

use News\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use BTNewsApp\Http\Users\Controllers\UsersController;
use Comments\Controllers\CommentController;

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

Route::middleware('auth:api')->get('/users', [ UsersController::class,'user']);

Route::apiResource('/news', NewsController::class);

Route::apiResource('/comments', CommentController::class);

