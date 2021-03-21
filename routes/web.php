<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});
Route::get('/register/create',[AuthController::class,'get_register']);
Route::get('/login/create',[AuthController::class,'get_login'])->name('create_login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


//Route::resource('employees', [EmployeeController::class]);
Route::get('/employees', [EmployeeController::class,'index']);

Route::get('/employees/{employee}/show', [EmployeeController::class,'show']);
Route::get('/employees/create', [EmployeeController::class,'create']);
Route::post('/employees', [EmployeeController::class,'store'])->name('employees');
Route::get('/employees/{employee}/edit', [EmployeeController::class,'edit']);
Route::PATCH('/employees/{employee}', [EmployeeController::class,'update']);
Route::DELETE('/employees/{employee}', [EmployeeController::class,'destroy']);


Route::post('employee/store_info',[EmployeeController::class,'store_info']);
Route::get('/info',[EmployeeController::class,'info']);
Route::get('/info/{id}',[EmployeeController::class,'delete_info']);


Route::get('/search',[EmployeeController::class,'search'])->name('search');
Route::get('/employee/info',[EmployeeController::class,'get_info']);
