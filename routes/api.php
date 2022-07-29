<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// route::apiResource("event","App\Http\Controllers\API\EventController")->middleware("auth:sanctum");


// route::apiResource("event","App\Http\Controllers\API\EventController")->middleware("auth:sanctum");
route::apiResource("event","App\Http\Controllers\API\EventController");

route::apiResource("eventcats","App\Http\Controllers\API\EventCatsController");

route::apiResource("post","App\Http\Controllers\API\PostController");
route::apiResource("comment","App\Http\Controllers\API\UserPostCommentController");


// route::post('file','PostController@file');




// route::apiResource("auth","App\Http\Controllers\Auth\AuthController");


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login',['\App\Http\Controllers\Auth\AuthController',"login"]);
    Route::post('logout',['\App\Http\Controllers\Auth\AuthController',"logout"]);

    Route::post('refresh',['\App\Http\Controllers\Auth\AuthController',"refresh"]);
    Route::post('me',['\App\Http\Controllers\Auth\AuthController',"me"]);


    Route::post('signupuser',['\App\Http\Controllers\Auth\AuthController',"signupuser"]);
    Route::post('signupteacher',['\App\Http\Controllers\Auth\AuthController',"signupteacher"]);
});


