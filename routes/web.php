<?php

namespace App\Http\Controllers;
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

// ----------------------- public page route section ----------------------- //
Route::get('/', [PublicPageController::class, 'index']);
Route::get('/faqs', [PublicPageController::class, 'faqs']);
Route::get('/about-us', [PublicPageController::class, 'about_us']);
Route::get('/contact-us', [PublicPageController::class, 'contact_us']);

// ----------------------- ADMIN panel route section ----------------------- //
Route::middleware('auth')->group(function() {
    Route::prefix('admin-panel/dashboard')->group(function() {
        Route::get('/', [AdminControllers\DashboardController::class, 'index']);

        Route::resource('branches', AdminControllers\BranchController::class);
        Route::resource('departments', AdminControllers\DepartmentController::class);
        Route::resource('roles', AdminControllers\RoleController::class);
        Route::resource('students', AdminControllers\StudentController::class);
        Route::resource('users', AdminControllers\UserController::class);
        
        Route::get('my-account', [AdminControllers\ProfileController::class, 'my_account']);
        Route::get('my-account-edit', [AdminControllers\ProfileController::class, 'my_account_edit']);
        Route::put('my-account-update', [AdminControllers\ProfileController::class, 'my_account_update']);
        Route::post('users-change-status', [AdminControllers\UserController::class, 'users_change_status']);

        Route::get('system-settings', [AdminControllers\SystemSettingsController::class, 'index']);
        Route::get('application-cache-clear', [AdminControllers\SystemSettingsController::class, 'application_cache_clear']);
    });
});

// ----------------------- STUDENT panel route section ----------------------- //
Route::prefix('student-panel')->group(function() {
    Route::get('/login', [Auth\StudentAuthenticationController::class, 'login']);
    Route::post('/login', [Auth\StudentAuthenticationController::class, 'login_store']);
    Route::get('/registration', [Auth\StudentAuthenticationController::class, 'registration']);
    Route::post('/registration', [Auth\StudentAuthenticationController::class, 'registration_store']);
    Route::get('/forgot-password', [Auth\StudentAuthenticationController::class, 'forgot_password']);
    Route::post('/forgot-password', [Auth\StudentAuthenticationController::class, 'forgot_password_store']);

    Route::middleware('auth:student')->group(function() {
        Route::prefix('dashboard')->group(function() {
            Route::get('/', [StudentControllers\DashboardController::class, 'index']);

            Route::get('my-account', [StudentControllers\ProfileController::class, 'my_account']);
            Route::get('my-account-edit', [StudentControllers\ProfileController::class, 'my_account_edit']);
            Route::put('my-account-update', [StudentControllers\ProfileController::class, 'my_account_update']);
            Route::post('/my-account-log-out', [Auth\StudentAuthenticationController::class, 'log_out']);
        });
    });
});

require __DIR__.'/auth.php';
