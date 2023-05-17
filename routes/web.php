<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Authentication
 */
Route::get('/', function () {
    return view('auth.login');
});

/**
 * ADMIN DASHBOARD
 */
Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard');
})->middleware(['auth', 'verified'])->name('admin_dashboard');

/**
 * CRUD FILE UPLOAD
 */
Route::get('admin_dashboard/uploads',[UploadController::class,'index'])->name('uploads');
Route::post('admin_dashboard/uploads/store',[UploadController::class,'store'])->name('uploads.store');
Route::post('admin_dashboard/uploads/destroy',[UploadController::class,'destroy'])->name('uploads.destroy');
Route::post('admin_dashboard/uploads/{id}',[UploadController::class,'update'])->name('uploads.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
