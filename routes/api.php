<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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



Route::get('event/userscount/{id}',['\App\Http\Controllers\API\EventController',"users_Count"]); // how many users will go the event
Route::get('event/nonactive',['App\Http\Controllers\API\EventController',"events_nonactive"]); // non active event
Route::put('event/change/{id}',['\App\Http\Controllers\API\EventController',"change_state"]); // change state active non active
Route::get('event/active',['\App\Http\Controllers\API\EventController',"events_active"]); // active event

Route::post('event/teacher_events',['\App\Http\Controllers\API\EventController',"teacher_events"]); // events created by the teacher
Route::post('event/inroll_index',['\App\Http\Controllers\API\EventController',"events_for_users"]); // events user will go

Route::post('event/search_inrollement',['\App\Http\Controllers\API\EventController',"search_inrollement"]);
Route::post('event/inroll_add',['\App\Http\Controllers\API\EventController',"event_inroll"]);  // user is in rolling in event

Route::delete('event/inroll_destroy',['\App\Http\Controllers\API\EventController',"event_outroll"]); // user is out rolling in event

Route::get('event/teacherbyid/{id}',['\App\Http\Controllers\API\EventController',"certian_teacher"]);


route::apiResource("event","App\Http\Controllers\API\EventController");






route::apiResource("eventcats","App\Http\Controllers\API\EventCatsController");

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
