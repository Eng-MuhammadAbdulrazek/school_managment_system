<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Grades\GradeController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
    
        Route::get('/', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified']);

        Route::resource('grade', GradeController::class);


    });


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// });

require __DIR__.'/auth.php';
