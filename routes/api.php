<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 🔽 追加
use App\Http\Controllers\Api\AuthController;
// 🔽 追加
use App\Http\Controllers\Api\TweetController;
// 🔽 追加
use App\Http\Controllers\Api\TweetLikeController;

//計算機能
use App\Http\Controllers\MultiplyController;

// 結婚式見積
use App\Http\Controllers\WeddingEstimateController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// 🔽 追加
Route::post('/register', [AuthController::class, 'register']);
// 🔽 追加
Route::post('/login', [AuthController::class, 'login']);

// 🔽 追加
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 🔽 追加
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tweets', TweetController::class);
    // 🔽 2 行追加
    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy']);
});


//計算機能
Route::post('/multiply', [MultiplyController::class, 'store']);

//結婚式見積
Route::post('/wedding-estimate', [WeddingEstimateController::class, 'store']);
