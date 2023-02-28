<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['name' => 'udin', 'role' => 'admin']);
});

Route::get('/students',[StudentController::class, 'index']);
Route::get('/students-add',[StudentController::class, 'create']);
Route::post('/student',[StudentController::class, 'store']);
Route::get('/students-edit/{id}',[StudentController::class, 'edit']);
Route::put('/student/{id}',[StudentController::class, 'update']);
Route::get('/students-hapus/{id}',[StudentController::class, 'hapus']);
Route::delete('/students-destroy/{id}',[StudentController::class, 'destroy']);

Route::get('/classroom',[ClassController::class, 'index']);
