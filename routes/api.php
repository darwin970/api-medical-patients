<?php

use App\Http\Controllers\DiagnosisAssignmentController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('/patients')->group(function () {
    Route::post('/register', [PatientController::class, 'register']);
    Route::patch('/{patientId}', [PatientController::class, 'update']);
    Route::get('/list-all', [PatientController::class, 'listAll']);
    Route::get('/search', [PatientController::class, 'search']);
    Route::delete('/{patientId}', [PatientController::class, 'delete']);
});

Route::prefix('/diagnosis-assignment')->group(function () {
    Route::post('/register', [DiagnosisAssignmentController::class, 'register']);
    Route::get('/get-latest', [DiagnosisAssignmentController::class, 'getLatest']);
});
