<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
Route::post('/todo',[TodoController::class, 'addTodo']);
Route::get('/todo',[TodoController::class, 'todolist']);
Route::get('/todo/{id}',[TodoController::class, 'findTodo']);
Route::delete('/todo/{id}',[TodoController::class, 'deleteTodo']);
Route::put('/todo/{id}',[TodoController::class, 'updateTodo']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
