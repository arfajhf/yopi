<?php

use App\Http\Controllers\Driver\DriverController;
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

// Route::get('/', function () {
//     return view('driver.index');
// });

Route::controller(DriverController::class)->group(function(){
    Route::get('/', 'index')->name('data.driver');
    Route::get('/create', 'create')->name('driver.create');
    Route::post('/create', 'store');
    Route::get('/update/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/view/{id}', 'view');
    Route::get('/delete/{id}', 'delete');
});

// Route::get('/', [DriverController::class, 'index'])->name('data.driver');
