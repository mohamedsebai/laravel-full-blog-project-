<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\ProfileController;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale() . '/admin',
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function(){ //...

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('admin.logout');



    Route::middleware('IsAdminMiddleware')->group(function () {
        Route::put('/password', [PasswordController::class, 'update'])->name('admin.password.update');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });



    Route::get('/routeAdminHome', function(){
        return view('admin.profile');
    })->middleware(['IsAdminMiddleware'])->name('routeAdminHome');

});

