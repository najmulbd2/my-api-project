<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('family')->group(function() {
    Route::get('/',[FamilyController::class, 'index'])->name('index.family');
    Route::get('add-family',[FamilyController::class, 'addFamily'])->name('add.family');
    Route::post('save-family',[FamilyController::class, 'saveFamily'])->name('save.family');
    Route::get('edit-family/{id}',[FamilyController::class, 'editFamily'])->name('edit.family');
    Route::post('update-family/{id}',[FamilyController::class, 'updateFamily'])->name('update.family');
    Route::post('delete-family',[FamilyController::class, 'deleteFamily'])->name('delete.family');
});

Route::prefix('circle')->group(function() {
    Route::get('/',[CircleController::class, 'index'])->name('index.circle');
    Route::get('add-circle',[CircleController::class, 'addCircle'])->name('add.circle');
    Route::post('save-circle',[CircleController::class, 'saveCircle'])->name('save.circle');
    Route::get('edit-circle/{id}',[CircleController::class, 'editCircle'])->name('edit.circle');
    Route::post('update-circle/{id}',[CircleController::class, 'updateCircle'])->name('update.circle');
    Route::post('delete-circle',[CircleController::class, 'deleteCircle'])->name('delete.circle');
});

Route::prefix('product')->group(function (){
    Route::get('/add/product',[ProductController::class,'AddProduct'])->name('add.product');
});

Route::get('logout',[AdminController::class,'Logout']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.layout.app');
    })->name('dashboard');
});
