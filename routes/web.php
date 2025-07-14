<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProfileController;

// Tambahan untuk reset password
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Reset Password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Grup routing dengan middleware auth
Route::middleware('auth')->group(function () {

    // Verifikasi Email
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function () {
        auth()->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim ke email kamu!');
    })->middleware('throttle:6,1')->name('verification.send');

    // Dashboard
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('dashboard');
        Route::get('/api', 'api')->name('dashboard.api');
    });

    // Produk
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');

        Route::get('export/pdf', 'exportPdf')->name('products.export.pdf');
        Route::get('export/excel', 'exportExcel')->name('products.export.excel');
    });

    // Kategori
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');

        Route::get('export/pdf', 'exportPdf')->name('categories.export.pdf');
        Route::get('export/excel', 'exportExcel')->name('categories.export.excel');
    });

    // Transaksi Penjualan
    Route::controller(SaleController::class)->prefix('sales')->group(function () {
        Route::get('', 'index')->name('sales');
        Route::get('create', 'create')->name('sales.create');
        Route::post('store', 'store')->name('sales.store');
        Route::get('export/pdf', 'exportPdf')->name('sales.export.pdf');
        Route::get('export/excel', 'exportExcel')->name('sales.export.excel');

        // ✅ Rute laporan berdasarkan tanggal
        Route::get('sales/report', [SaleController::class, 'reportForm'])->name('sales.report.form');
        Route::post('sales/report', [SaleController::class, 'report'])->name('sales.report.generate');
        Route::get('report/export/pdf', [SaleController::class, 'exportReportPdf'])->name('sales.report.export.pdf');
        Route::get('report/export/excel', [SaleController::class, 'exportReportExcel'])->name('sales.report.export.excel');
    });

    // Profil Admin
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
