<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('accounts')->group(function () {
    Route::get('/admin', function () {
        return 'welcome admin';
    });

    Route::get('/user', function () {
        return 'welcome user';
    });
});

Route::prefix('cars')->group(function () {

    Route::prefix('usa')->group(function () {
        Route::get('ford', function () {
            return 'your car is ford And made in usa';
        });
        
        Route::get('tesla', function () {
            return 'your car is tesla And made in usa';
        });

    
    });

    Route::prefix('ger')->group(function () {
        Route::get('mercedes', function () {
            return 'your car is made in Germany - its name is Mercedes';
        });
        
        Route::get('audi', function () {
            return 'your car is made in Germany - its name is audi';
        });
        
        Route::get('volkswagen', function () {
            return 'your car is made in Germany - its name is volkswagen';
        });
    });
    

    
});








