<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormEntryController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/temp', function () {return view('temp');});
// Form Entry Routes
Route::get('/form-entry/create', [FormEntryController::class, 'create'])->name('form-entry.create');

Route::post('/form-entry/store', [FormEntryController::class, 'store'])->name('form-entry.store');


// Route::get('/admin/form-entries', [AdminDashboardController::class, 'getFormEntries'])->name('admin.form-entries');


// Admin Dashboard Routes
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/form-entries', [AdminDashboardController::class, 'getFormEntries'])->name('admin.form-entries');
    Route::get('/admin/form-entry/{id}', [AdminDashboardController::class, 'showFormEntry'])->name('admin.form-entry.show');
    Route::get('/admin/form-entry/{id}/edit', [AdminDashboardController::class, 'edit'])->name('admin.form-entry.edit');
    Route::put('/admin/form-entry/{id}', [AdminDashboardController::class, 'update'])->name('admin.form-entry.update');
    Route::delete('/admin/form-entry/{id}', [AdminDashboardController::class, 'delete'])->name('admin.form-entry.delete');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
