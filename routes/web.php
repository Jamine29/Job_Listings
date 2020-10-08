<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Auth::routes();

Route::redirect('/', '/jobs');

// jobs
Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('jobs.edit');

Route::resource('/companies', CompanyController::class)->names([
    'store' => 'companies.store'
]);

