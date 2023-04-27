<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotController;
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

Route::get('/', function () {
    return redirect('home');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('lots/index', [LotController::class, 'index'])->name('lots');
Route::get('lots/show/{id}', [LotController::class, 'show'])->name('show-lot');
Route::get('lots/create', [LotController::class, 'create'])->name('add-new-lot');
Route::post('lots/store', [LotController::class, 'store'])->name('store-lot');
Route::get('lots/edit/{id}', [LotController::class, 'edit'])->name('edit-lot');
Route::post('lots/edit{id}', [LotController::class, 'update'])->name('update-lot');
Route::delete('lots/index/{id}', [LotController::class, 'destroy'])->name('delete-lot');

Route::get('categories/index', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/show/{id}', [CategoryController::class, 'show'])->name('show-category');
Route::get('categories/create', [CategoryController::class, 'create'])->name('add-new-category');
Route::post('categories/store', [CategoryController::class, 'store'])->name('store-category');
Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::post('categories/edit{id}', [CategoryController::class, 'update'])->name('update-category');
Route::delete('categories/index/{id}', [CategoryController::class, 'destroy'])->name('delete-category');