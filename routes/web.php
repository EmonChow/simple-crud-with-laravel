<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

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

  

Route::get('/cars', [CarsController::class, 'index'])->name('cars.list');
Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');
Route::post('cars/store', [CarsController::class, 'store'])->name('cars.store');


Route::get('/edit/{id}', [CarsController::class, 'edit'])->name('cars.edit');
 Route::post('/update/{id}', [CarsController::class, 'update'])->name('cars.update');
 Route::get('/delete/{id}', [CarsController::class, 'delete'])->name('cars.delete');

