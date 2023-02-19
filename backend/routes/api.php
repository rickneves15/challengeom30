<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('patient', [PatientController::class, 'index']);
Route::get('patient/{id}', [PatientController::class, 'show']);
Route::post('patient', [PatientController::class, 'store']);
Route::put('patient/{id}', [PatientController::class, 'update']);
Route::delete('patient/{id}', [PatientController::class, 'destroy']);

Route::get('get-address/{cep}', [AddressController::class, 'getAddress']);
