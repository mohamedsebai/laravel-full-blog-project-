<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function redirectToGoogle(){
        //->stateless()
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->stateless()->redirect();
    }

     public function redirectToGithub(){
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function handelGoogleCallback(){

            // you should use stateless with google
            $googelUser =  Socialite::driver('google')->stateless()->user();
            $user = User::updateOrCreate([
                'social_id' => $googelUser->id,
            ], [
                'name' => $googelUser->name,
                'email' => $googelUser->email,
                'social_id' => $googelUser->id,
                'socail_type' => 'google',
                // he wil not ever use password to login with google , by default laravel will now his password by just click in google auth link or facebook
                'password'    => Hash::make('google-with-my-password'),

            ]);



            Auth::login($user, $remember = true);

            return redirect()->route('home.page');
    }

    public function handelFacebookCallback(){


            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $user = User::updateOrCreate([
                'social_id' => $facebookUser->id,
            ], [
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'social_id' => $facebookUser->id,
                'socail_type' => 'facebook',
                // he wil not ever use password to login with facebook , by default laravel will now his password by just click in facebook auth link or google
                'password'    => Hash::make('facebook-with-my-password'),
            ]);

            Auth::login($user,  $remember = true);

            return redirect()->route('home.page');
    }


    public function handelGithubCallback(){


            $githubUser = Socialite::driver('github')->stateless()->user();
            $user = User::updateOrCreate([
                'social_id' => $githubUser->id,
            ], [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'social_id' => $githubUser->id,
                'socail_type' => 'github',
                // he wil not ever use password to login with github , by default laravel will now his password by just click in facebook auth link or google
                'password'    => Hash::make('github-with-my-password'),
            ]);

            Auth::login($user,  $remember = true);

            return redirect()->route('home.page');
    }
}
