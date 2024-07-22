<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;


Route::prefix('cars')->group(function () {
Route::get('create', [CarController::class,'create'])->name('cars.create');
Route::post('store', [CarController::class,'store'])->name('cars.store');
Route::get('index', [CarController::class,'index'])->name('cars.index');
Route::get('edit/{id}', [CarController::class,'edit'])->name('cars.edit');
});

Route::prefix('class')->group(function () {
Route::get('create', [ClassController::class,'create'])->name('class.create');
Route::post('store', [ClassController::class,'store'])->name('class.store');
Route::get('index', [ClassController::class,'index'])->name('class.index');
Route::get('edit/{id}', [ClassController::class,'edit'])->name('class.edit');

});







