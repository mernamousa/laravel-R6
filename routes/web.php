<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;


Route::prefix('cars')->group(function () {
Route::get('create', [CarController::class,'create'])->name('cars.create');
Route::post('store', [CarController::class,'store'])->name('cars.store');
Route::get('index', [CarController::class,'index'])->name('cars.index');
Route::get('edit/{id}', [CarController::class,'edit'])->name('cars.edit');
Route::put('update/{id}', [CarController::class,'update'])->name('cars.update');
Route::get('show/{id}', [CarController::class,'show'])->name('cars.show');
Route::get('delete/{id}', [CarController::class,'destroy'])->name('cars.destroy');
Route::get('showDeleted', [CarController::class,'showDeleted'])->name('cars.showDeleted');
Route::patch('restore/{id}', [CarController::class,'restore'])->name('cars.restore');
Route::delete('forceDelete/{id}', [CarController::class,'forceDelete'])->name('cars.forceDelete');
});

Route::prefix('class')->group(function () {
Route::get('create', [ClassController::class,'create'])->name('class.create');
Route::post('store', [ClassController::class,'store'])->name('class.store');
Route::get('index', [ClassController::class,'index'])->name('class.index');
Route::get('edit/{id}', [ClassController::class,'edit'])->name('class.edit');
Route::put('update/{id}', [ClassController::class,'update'])->name('class.update');
Route::get('show/{id}', [ClassController::class,'show'])->name('class.show');
Route::get('delete/{id}', [ClassController::class,'destroy'])->name('class.destroy');
Route::get('showDeleted', [ClassController::class,'showDeleted'])->name('class.showDeleted');
Route::delete("delete/{id}", [ClassController::class,"destroyForm"])->name('delete.form');


});







