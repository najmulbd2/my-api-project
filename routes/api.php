<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('email-verification',[AdminController::class,'emailVerification']);


Route::get('store-contact',[ProductController::class,'storeContact']);

Route::prefix('students')->group(function (){
    Route::get('view',[ProductController::class,'viewStudents'])->name('view.student');
    Route::post('info/store',[ProductController::class,'storeStudentsInfo'])->name('store.student.info');
});


