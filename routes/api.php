<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * AUTHENTICATION
 */
//Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**
 * PROTECTED ROUTES
 */
Route::group(['middleware' => ['auth:sanctum']], function () {
    /**
     * Route Uploads Api
     */
    Route::get('uploads/{id}',[UploadController::class,'show']);
    Route::patch('uploads/{id}',[UploadController::class,'update']);
    Route::delete('uploads/{id}',[UploadController::class,'delete']);
    Route::post('uploads',[UploadController::class,'create']);
    Route::get('/uploads',[UploadController::class,'index']);

    /**
     * Logout Function
     */
    Route::post('logout', [AuthController::class, 'logout']);
});





