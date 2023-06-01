<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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
Route::get('/create',[CrudController::class,'create']);
Route::post('/create',[CrudController::class,'saveFormData']);
Route::get('/view',[CrudController::class,'index']);
Route::get('/delete/{id}',[CrudController::class,'delete']);
Route::get('/update/{id}',[CrudController::class,'edit']);
Route::post('/update/{id}',[CrudController::class,'updateForm']);
//
// Route::get('Delete/{id}',[TeacherController::class,'Remove']);