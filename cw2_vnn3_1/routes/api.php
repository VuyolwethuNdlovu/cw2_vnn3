<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::apiResources(
//    [
//        'questions' => 'API\QuestionController',
//        'options'=>'API\OptionsController',
//    ]
//);

Route::get('GetAllQuestions',[\App\Http\Controllers\Api\QuestionController::class, 'index']);
Route::get('GetQuestionOptions/{questions_id}',[\App\Http\Controllers\Api\OptionController::class, 'getOptionsForQuestion']);
Route::post('resident/dashboard/vote/',[\App\Http\Controllers\Api\ResultController::class, 'saveAnswer']);
Route::get('resident/dashboard/result/{questions_id}/{user_id}',[\App\Http\Controllers\Api\ResultController::class, 'checkUserAnswered']);
Route::get('officer/dashboard/GetQuestionResponse/{question_id}', [\App\Http\Controllers\Api\ResultController::class,'showResult']);






