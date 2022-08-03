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
Route::post('event/search_for_teacher_events',['\App\Http\Controllers\API\EventController',"search_for_teacher_events"]);

route::apiResource("event","App\Http\Controllers\API\EventController");


Route::group([

    'middleware' => 'api',
    'prefix' => 'event-notification'

], function () {
    Route::post('create',['\App\Http\Controllers\Api\EventNotification',"create"]);
    Route::get('show',['\App\Http\Controllers\Api\EventNotification',"show"]);
    Route::get('update/{id}',['\App\Http\Controllers\Api\EventNotification',"update"]);

});



route::apiResource("normaluser","App\Http\Controllers\API\NormalUserController");

route::apiResource("eventcats","App\Http\Controllers\API\EventCatsController");

route::apiResource("teacher","App\Http\Controllers\API\TeacherController");

route::apiResource("post","App\Http\Controllers\API\PostController");
route::apiResource("comment","App\Http\Controllers\API\UserPostCommentController");
route::apiResource("teachercomment","App\Http\Controllers\API\TeacherPostCommentController");
route::apiResource("likes","App\Http\Controllers\API\UserPostLikeController");



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
Route::get('classcats/{id}',['\App\Http\Controllers\API\EventCatsController',"classcat"]);
Route::get('classcats/{id}',['\App\Http\Controllers\API\EventCatsController',"classcat"]);
route::apiResource("myclasses","App\Http\Controllers\API\MyClassController");
Route::post('myclasses/rate',["App\Http\Controllers\API\MyClassController",'myClassRate']);
Route::get('myclasses/totalRate/{id}',["App\Http\Controllers\API\MyClassController",'totalRating']);
Route::get('eventcat/{id}',['\App\Http\Controllers\API\EventCatsController',"eventcat"]);
