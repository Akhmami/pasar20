<?php

use App\Http\Controllers\CekOngkirController;
use App\Http\Controllers\KelipatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');
Route::get('/kelipatan', [KelipatanController::class, 'index'])->name('kelipatan');
Route::get('/cek-ongkir', [CekOngkirController::class, 'index'])->name('cek-ongkir');
