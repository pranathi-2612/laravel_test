<?php

use App\Http\Controllers\companycontroller;
use App\Http\Controllers\employeecontroller;
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

Auth::routes(['register' => false]);

// Route::middleware('auth')->group(function () {
//     Route::resource('companies', CompanyController::class);
//     Route::resource('employees', EmployeeController::class);
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Company Management

Route::get('/company', [companycontroller::class, 'index'])->name('company');
Route::get('/createcompany', [companycontroller::class, 'create'])->name('createcompany');
Route::post('/company_reg', [companycontroller::class, 'store'])->name('company_reg');

Route::get('/view', [companycontroller::class, 'view'])->name('view');
Route::get('/companyview', [companycontroller::class, 'show'])->name('companyview');

// Route::get('/editcompany/{id}', [companycontroller::class, 'edit'])->name('editcompany');

Route::get('/editcompany/{id}', [companycontroller::class, 'edit'])->name('editcompany');

Route::post('/update_company/{id}', [companycontroller::class, 'update'])->name('update_company');
Route::get('/delete_company/{id}', [companycontroller::class, 'destroy'])->name('delete_company');


// Employee Management

Route::get('/employee', [employeecontroller::class, 'index'])->name('employee');
Route::get('/create_employees', [employeecontroller::class, 'create'])->name('create_employees');
Route::post('/store_employees', [employeecontroller::class, 'store'])->name('store_employees');
Route::get('/empview', [employeecontroller::class, 'empview'])->name('empview');
Route::get('/view_employees', [employeecontroller::class, 'show'])->name('view_employees');
Route::get('/edit_employees/{id}', [employeecontroller::class, 'edit'])->name('edit_employees');
Route::post('/update_employees/{id}', [employeecontroller::class, 'update'])->name('update_employees');
Route::get('/delete_employees/{id}', [employeecontroller::class, 'destroy'])->name('delete_employees');


