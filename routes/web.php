<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('permission:view dashboard')->name('dashboard');

Route::get('/page1',function(){
    return "page 1";
})->middleware('permission:view page 1');

Route::get('/page2',function(){
    return "page 2";
})->middleware('permission:view page 2');

Route::get('/page3',function(){
    return "page 3";
})->middleware('permission:view page 3');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
