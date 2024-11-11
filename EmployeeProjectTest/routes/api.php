<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companycontroller;
use App\Http\Controllers\employeecontroller;

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

//Company

Route::post('/companylist', [companycontroller::class, 'store'])->name('companylist');
Route::get('/companylist', [companycontroller::class, 'show'])->name('companylist');
Route::get('/companylist/{id}', [companycontroller::class, 'edit'])->name('companylist');
Route::post('/companylist/{id}', [companycontroller::class, 'update'])->name('companylist');
Route::delete('/companylist{id}', [companycontroller::class, 'destroy'])->name('companylist');

//Employee

Route::get('/employeelist', [employeecontroller::class, 'create'])->name('employeelist');
Route::get('/employeelist', [employeecontroller::class, 'show'])->name('employeelist');
Route::get('/employeelist/{id}', [employeecontroller::class, 'edit'])->name('employeelist');
Route::put('/employeelist/{id}', [employeecontroller::class, 'update'])->name('employeelist');
Route::delete('/employeelist{id}', [employeecontroller::class, 'destroy'])->name('employeelist');