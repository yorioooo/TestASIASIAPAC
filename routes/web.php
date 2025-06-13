<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{nomor}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{nomor}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{nomor}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{nomor}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
