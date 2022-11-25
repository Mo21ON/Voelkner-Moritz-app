<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AjaxController;            // Ajax




Route::get('/', function () {
    return redirect('register');
});

Route::get('/dashboard', function () {
    return redirect('foods');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/counter', [AjaxController::class, 'Counter'])->name("counter");      // Ajax 
 
   
});

require __DIR__.'/auth.php';

Route::resource('foods', FoodController::class);
