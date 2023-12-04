<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\SchoolGradesController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SectionController;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth', 'verified',],
    ],
    function () {
    
        Route::get('/', function () {
            return view('dashboard');
        });

        Route::resource('Grades', SchoolGradesController::class);
        Route::resource('Classrooms', ClassroomController::class);
        Route::delete('/classrooms/destroySelected', [ClassroomController::class, 'destroySelected'])->name('classrooms.destroySelected');
        Route::resource('Sections', SectionController::class);
        Route::get('classes/{id}',[SectionController::class, 'getClasses']);
        Route::patch('Sections/{Section}', [SectionController::class, 'update'])->name('Sections.update');
        Route::resource('Parents', ParentController::class);

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
        Route::get('test',function(){
            return view('app');
        });

    });
  

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// });

require __DIR__.'/auth.php';
