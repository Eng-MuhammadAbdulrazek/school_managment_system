<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\SchoolGradesController;
use App\Http\Controllers\Classrooms\ClassroomController;


Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth', 'verified'],
    ],
    function () {
    
        Route::get('/', function () {
            return view('dashboard');
        });

        Route::resource('Grades', SchoolGradesController::class);
        Route::resource('Classrooms', ClassroomController::class);
        Route::delete('/classrooms/destroySelected', [ClassroomController::class, 'destroySelected'])->name('classrooms.destroySelected');




    });


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// });

require __DIR__.'/auth.php';
