<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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


Route::get('/task-list',[TaskController::class, 'taskList']);
Route::post('/add-task',[TaskController::class, 'addTask']);
Route::post('/toggle-status',[TaskController::class, 'statusToggle']);
Route::post('/delete-task',[TaskController::class, 'DeleteTask']);
Route::post('/fetch-task',[TaskController::class, 'fetchTask']);
Route::post('/update-task',[TaskController::class, 'updateTask']);
