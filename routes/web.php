<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\SocialController;
use Illuminate\Auth\Events\Verified;

Route::get('', function () {
    return view('welcome');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::prefix('cars')->middleware('verified')->group(function () {
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
Route::patch('restore/{id}', [ClassController::class,'restore'])->name('class.restore');
Route::delete('forceDelete/{id}', [ClassController::class,'forceDelete'])->name('class.forceDelete');

});



Route::get('upload', [ExampleController::class,'upload'])->name('upload');
Route::get('test', [ExampleController::class,'test'])->name('test');
Route::get('testdb', [ExampleController::class,'testdb'])->name('testdb');
Route::post('upload', [ExampleController::class,'uploadImage'])->name('upload.image');


Route::get('index', [FashionController::class,'index'])->name('index');
Route::get('create', [FashionController::class,'create'])->name('fashion.create');
Route::post('store', [FashionController::class,'store'])->name('fashion.store');
Route::get('about', [FashionController::class,'about'])->name('fashion.about');
Route::get('showAll', [FashionController::class,'showAll'])->name('fashion.showAll');
Route::get('edit/{id}', [FashionController::class,'edit'])->name('fashion.edit');
Route::put('update/{id}', [FashionController::class,'update'])->name('fashion.update');
Route::get('show/{id}', [FashionController::class,'show'])->name('fashion.show');
Route::get('delete/{id}', [FashionController::class,'destroy'])->name('fashion.destroy');

Route::get('contactus',[ExampleController::class,'contactus']);
Route::post('sendmsg',[ExampleController::class,'sendmsg'])->name('sendmsg');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/github/redirect', [SocialController::class, 'redirect'])->name('socialLogin');
Route::get('auth/github/callback', [SocialController::class, 'callback']);