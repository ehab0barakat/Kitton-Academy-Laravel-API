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



route::apiResource("event","App\Http\Controllers\API\EventController");
Route::post('event/teacher',['\App\Http\Controllers\API\EventController',"events-for-target-teacher"]);
Route::post('event/notactive',['\App\Http\Controllers\API\EventController',"events-isnotactive"]);
Route::post('event/for-users',['\App\Http\Controllers\API\EventController',"events-for-users"]);






route::apiResource("eventcats","App\Http\Controllers\API\EventCatsController");

route::apiResource("post","App\Http\Controllers\API\PostController");
route::apiResource("comment","App\Http\Controllers\API\UserPostCommentController");


// route::post('file','PostController@file');




// route::apiResource("auth","App\Http\Controllers\Auth\AuthController");

route::apiResource("classes","App\Http\Controllers\API\ClassController");

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login',['\App\Http\Controllers\Auth\AuthController',"login"]);
    Route::post('logout',['\App\Http\Controllers\Auth\AuthController',"logout"]);

    Route::post('refresh',['\App\Http\Controllers\Auth\AuthController',"refresh"]);
    Route::get('me',['\App\Http\Controllers\Auth\AuthController',"me"]);

    Route::post('signupuser',['\App\Http\Controllers\Auth\AuthController',"signupuser"]);
    Route::post('signupteacher',['\App\Http\Controllers\Auth\AuthController',"signupteacher"]);
});


route::apiResource("classescats","App\Http\Controllers\API\ClassCatsController");

Route::get('eventcat/{id}',['\App\Http\Controllers\API\EventCatsController',"eventcat"]);
