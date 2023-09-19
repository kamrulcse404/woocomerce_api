<?php

use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DependController;
use App\Http\Controllers\Dashboard\DesignationController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\WoocomerceController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('backend.dashboard.home');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('designation', DesignationController::class);
    Route::resource('tag', TagController::class);
    Route::resource('client', ClientController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);


    // woocomerce start
    Route::resource('woocomerce', WoocomerceController::class);
    Route::resource('order', OrderController::class);
    // woocomerce end

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('getprojects/{id}', [DependController::class, 'getProjects']);
    Route::get('getemployees/{id}', [DependController::class, 'getEmployees']);
});
