<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempatIbadahController;

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

Route::get('/', function () {
    return view('welcome');
});

// Resource route untuk TempatIbadah
Route::resource('tempat-ibadah', TempatIbadahController::class);
 Route::get('/tempat-ibadah', [TempatIbadahController::class, 'index'])->name('tempat-ibadah.index');
Route::get('/tempat-ibadah/search', [TempatIbadahController::class, 'search'])->name('tempat-ibadah.search');
Route::get('/tempat-ibadah/{id}', [TempatIbadahController::class, 'show'])->name('tempat-ibadah.show');
