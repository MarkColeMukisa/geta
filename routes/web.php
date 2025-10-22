<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\BillController;

Route::get('/', function () {
    return app(BillController::class)->index(new \App\Models\Tenant());
});

// Redirect /index to root for consistency
Route::redirect('/index', '/');

Route::get('/dashboard', [TenantController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated user routes (no admin requirement)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Bills
    Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
    Route::get('/tenants/{tenant}/previous-reading', [BillController::class, 'previousReading'])->name('tenants.previous-reading');
});

// Admin-only tenant management routes
Route::middleware(['auth','can:manage-tenants'])->group(function () {
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::patch('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
    Route::get('/tenants-export', [TenantController::class, 'exportCsv'])->name('tenants.export');
    Route::view('/admin/users', 'admin.users')->name('admin.users');
});

require __DIR__.'/auth.php';
