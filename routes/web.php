<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task-list',[TaskController::class, 'taskList']);
Route::post('/add-task',[TaskController::class, 'addTask']);
Route::post('/toggle-status',[TaskController::class, 'statusToggle']);
Route::post('/delete-task',[TaskController::class, 'DeleteTask']);
Route::post('/fetch-task',[TaskController::class, 'fetchTask']);
Route::post('/update-task',[TaskController::class, 'updateTask']);