<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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



Route::get("/",[StudentsController::class,"index"]);

Route::get("/students/create",[StudentsController::class,"add_show"]);
Route::post("/students/create",[StudentsController::class,"add_logic"]);

Route::get("/students/{id}/edit",[StudentsController::class,"edit_show"]);
Route::post("/students/{id}/edit",[StudentsController::class,"edit_logic"]);

Route::get("/students/{id}/delete",[StudentsController::class,"delete"]);
