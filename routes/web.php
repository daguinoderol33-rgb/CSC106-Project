<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authenticated routes
Route::middleware('auth')->group(function() {

    Route::get('/', function () {
    return redirect()->route('login');
});



    // Dashboard
    Route::get('/dashboard', [TransactionController::class, 'dashboard'])->name('dashboard');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/status/{status}', [TransactionController::class, 'filterByStatus'])->name('transactions.status');

    // Update transaction status
    Route::patch('/transactions/{transaction}/status', [TransactionController::class, 'updateStatus'])->name('transactions.updateStatus');

    // History
    Route::get('/history', [HistoryController::class, 'index'])->name('history');

    // Settings & Account
    Route::get('/settings', function () { return view('settings'); })->name('settings');
    Route::get('/account', function () { return view('account'); })->name('account');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::patch('/account/update', [ProfileController::class, 'updateAccount'])
        ->name('account.update');
});

Route::middleware('auth')->group(function () {
    Route::put('/account/password', [ProfileController::class, 'updatePassword'])
        ->name('account.password');
});




// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

