<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GatewayController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\WaLogController;
use App\Http\Controllers\Portal\PortalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/customers', CustomerController::class)->name('customers');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::get('/monitoring', MonitoringController::class)->name('monitoring');
    Route::get('/gateway', GatewayController::class)->name('gateway');
    Route::get('/wa-logs', WaLogController::class)->name('wa-logs');
});

/*
|--------------------------------------------------------------------------
| Public Invoice Portal (possession-based token)
|--------------------------------------------------------------------------
*/
Route::prefix('invoice')->name('portal.')->group(function () {
    Route::get('/{token}', [PortalController::class, 'detail'])->name('detail');
    Route::get('/{token}/methods', [PortalController::class, 'methods'])->name('methods');
    Route::get('/{token}/instructions', [PortalController::class, 'instructions'])->name('instructions');
    Route::get('/{token}/instructions-kuitansi', [PortalController::class, 'instructionsKuitansi'])->name('instructions-kuitansi');
    Route::get('/{token}/checkout', [PortalController::class, 'checkout'])->name('checkout');
    Route::get('/{token}/receipt', [PortalController::class, 'receipt'])->name('receipt');
});

/*
|--------------------------------------------------------------------------
| Root
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});
