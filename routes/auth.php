<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SinglePageContoller;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){


    //Route::prefix('front')->group(function(){

        Route::middleware('guest')->group(function () {
            Route::get('register', [RegisteredUserController::class, 'create'])
                        ->name('register');

            Route::post('register', [RegisteredUserController::class, 'store']);

            Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

            Route::post('login', [AuthenticatedSessionController::class, 'store']);

            Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                        ->name('password.request');

            Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                        ->name('password.email');

            Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                        ->name('password.reset');

            Route::post('reset-password', [NewPasswordController::class, 'store'])
                        ->name('password.store');

        });


        Route::middleware('auth')->group(function () {

            Route::get('verify-email', EmailVerificationPromptController::class)
                        ->name('verification.notice');

            Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                        ->middleware(['signed', 'throttle:6,1'])
                        ->name('verification.verify');

            Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                        ->middleware('throttle:6,1')
                        ->name('verification.send');

            Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                        ->name('password.confirm');

            Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

            Route::put('/password', [PasswordController::class, 'update'])->name('password.update');


            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                        ->name('logout');


            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        });



        // gust or auth you can access these route
        Route::get('/', HomeController::class)->name('home.page');


        Route::match(['post', 'get'], '/search', SearchController::class)->name('search.show');

        Route::get('/category/{id}/{slug}', CategoryController::class)->name('category.show');
        Route::get('/tag/{id}/{slug}', TagController::class)->name('tag.show');
        Route::get('/single/{id}/{slug}', [ SinglePageContoller::class, 'show' ])->name('single.show');
        Route::post('/single/store', [ SinglePageContoller::class, 'store' ])->name('single.store');
        Route::delete('/single/destroy/{id}', [ SinglePageContoller::class, 'destroy' ])->name('single.destroy');
        Route::put('/single/update/{id}', [ SinglePageContoller::class, 'update' ])->name('single.update');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact.page.index');
        Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.page.store');

        Route::get('/privacy-policy', PrivacyController::class)->name('privacy.page');
        Route::get('/about-us', AboutUsController::class)->name('about-us.page');

    //});

});
