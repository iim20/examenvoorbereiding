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


Route::get('/', [DashboardController::class, 'index']);
// Route::put('/', [DashboardController::class, 'updatestatus'])->name('dashboard.updatestatus');


Route::resource('storingen', StoringController::class);


Route::get('/medewerkers', function () {
    return view('pages.medewerkers');
});