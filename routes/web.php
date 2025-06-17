<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\PaymentsController;
use App\Models\Residents;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


/* House Routes */
Route::get('/house-data', [HouseController::class, 'index'])->name('house');

Route::get('/add-house-data', [HouseController::class, 'create'])->name('house-add');

Route::post('/create-house-data', [HouseController::class, 'store']);

Route::get('/edit-house-data-{slug}', [HouseController::class, 'edit'])->name('house-edit');

Route::post('/update-house-data-{slug}', [HouseController::class, 'update']);

Route::post('/delete-house-{slug}', [HouseController::class, 'destroy']);


/* Residents Routes */
Route::get('/residents-data', [ResidentsController::class, 'index'])->name('residents');

Route::get('/add-residents-data', [ResidentsController::class, 'create'])->name('residents-add');

Route::post('/create-residents-data', [ResidentsController::class, 'store']);

Route::get('/edit-residents-data-{slug}', [ResidentsController::class, 'edit'])->name('residents-edit');

Route::post('/update-residents-data-{slug}', [ResidentsController::class, 'update']);

Route::post('/delete-resident-{slug}', [ResidentsController::class, 'destroy']);


/* Payments Routes */
Route::get('/payments-data', [PaymentsController::class, 'index'])->name('payments');

Route::get('/add-payments-data', [PaymentsController::class, 'create'])->name('payments-add');

Route::post('/create-payments-data', [PaymentsController::class, 'store']);

Route::get('/edit-payments-data-{slug}', [PaymentsController::class, 'edit'])->name('payments-edit');

Route::post('/update-payments-data-{slug}', [PaymentsController::class, 'update']);

Route::post('/delete-payments-{slug}', [PaymentsController::class, 'destroy']);
