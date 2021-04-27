<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
$base_route = basename(base_path());

Route::get($base_route . '/', [PageController::class, 'home'])->name('home');

Route::get($base_route . '/location', [PageController::class, 'location'])->name('location');

Route::get($base_route . '/stats', function() {
    return view('stats');
})->name('stats');