<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('employees', [EmployeesController::class, 'index']);
Route::post('employees', [EmployeesController::class, 'store']);
Route::get('employees/{id}', [EmployeesController::class, 'show']);
Route::get('employees/{id}/edit', [EmployeesController::class, 'edit']);
Route::put('employees/{id}/edit', [EmployeesController::class, 'update']);
Route::delete('employees/{id}/delete', [EmployeesController::class, 'destroy']);


Route::get('sales', [SalesController::class, 'index']);
Route::post('sales', [SalesController::class, 'store']);
Route::get('sales/{id}', [SalesController::class, 'show']);
Route::get('sales/{id}/edit', [SalesController::class, 'edit']);
Route::put('sales/{id}/edit', [SalesController::class, 'update']);
Route::delete('sales/{id}/delete', [SalesController::class, 'destroy']);
