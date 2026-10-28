<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;

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
    return view('index');
});

Route::get('/login', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Admin-only resources
Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('doctors', DoctorController::class)->except(['index', 'show']);
    Route::resource('employees', EmployeeController::class)->except(['index', 'show']);
});

// Shared resources: admin and employee can full CRUD
Route::middleware(['auth','role:admin,employee'])->group(function () {
    Route::resource('doctors', DoctorController::class)->only(['index', 'show']);
    Route::resource('employees', EmployeeController::class)->only(['index', 'show']);
    Route::resource('patients', PatientController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('appointments', AppointmentController::class);
});

// Authenticated profile routes
Route::middleware(['auth'])->group(function () {
    // صفحة البروفايل (عرض)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // تحديث المعلومات الشخصية (Name & Email)
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // تحديث كلمة المرور
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

require __DIR__.'/auth.php';

