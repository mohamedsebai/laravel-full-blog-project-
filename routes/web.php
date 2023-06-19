<?php

use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return  redirect()->route('home.page');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// social media login
Route::get('auth/google', [ SocialiteController::class , 'redirectToGoogle'])->name('google.auth.now');
Route::get('auth/google/callback', [ SocialiteController::class , 'handelGoogleCallback']);

Route::get('auth/facebook', [ SocialiteController::class , 'redirectToFacebook'])->name('facebook.auth.now');
Route::get('/auth/facebook/callback', [ SocialiteController::class , 'handelFacebookCallback']);

Route::get('auth/github', [ SocialiteController::class , 'redirectToGithub'])->name('github.auth.now');
Route::get('/login/oauth2/code/github', [ SocialiteController::class , 'handelGithubCallback']);
// end socail media login

require __DIR__.'/auth.php';
