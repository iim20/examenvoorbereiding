<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoringController;
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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::patch('/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
Route::middleware('auth')->group(function () {

    Route::resource('storingen', StoringController::class);

});

Route::get('/medewerkers', function () {
    return view('pages.medewerkers');
});

Route::fallback(function () {
    abort(404);
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
