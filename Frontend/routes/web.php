<?php

use App\Http\Controllers\TodoController;
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

Route::get('todos', [TodoController::class, 'index']);
Route::get('todos/create', [TodoController::class, 'create']);
Route::post('todos/create', [TodoController::class, 'store']);
Route::get('todos/edit/{id}', [TodoController::class, 'edit']);
Route::post('todos/edit/{id}/update', [TodoController::class, 'update']);
Route::post('todos/edit/{id}/complete', [TodoController::class, 'complete']);
Route::delete('todos/edit/{id}/incomplete', [TodoController::class, 'incomplete']);
Route::delete('todos/edit/{id}/delete', [TodoController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});
