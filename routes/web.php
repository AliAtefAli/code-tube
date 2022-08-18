<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('channels/{channel}/edit', [\App\Http\Controllers\ChannelController::class, 'edit'])->name('channels.edit');
    Route::put('channels/{channel}/update', [\App\Http\Controllers\ChannelController::class, 'update'])->name('channels.update');
    Route::get('channels/{channel}', [\App\Http\Controllers\ChannelController::class, 'show'])->name('channels.show');
});
//Route::resource('channels', \App\Http\Controllers\ChannelController::class);
