<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JoinController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\AskController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group( function() {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/join', [JoinController::class, 'joinClassroom']);
    Route::get('/search', [SearchController::class, 'searchClassroom']);
    Route::get('/classroom-list', [ClassroomController::class, 'index']);
    Route::post('/attendance', [AttendanceController::class, 'recordAttendance']);
    Route::post('/answer', [AnswerController::class, 'index']); //Receive answer from question ask by teacher
    Route::get('/answer/{question_id}', [AnswerController::class, 'get_answers']);
    Route::post('/ask', [AskController::class, 'index']); //Receive question from the student
    Route::get('/logout', [AuthController::class, 'logout']);
});
