<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function showLoginForm(){
      return view('login');
    }

    public function redirectToGoogle(Request $request){
      return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        print_r($googleUser);die;
        // $user = User::where('email', $googleUser->email)->first();
        // if(!$user)
        // {
        //     $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000,999999))]);
        // }

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function redirectToFacebook(){
      return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
      $facebookUser = Socialite::driver('facebook')->stateless()->user();
      print_r($facebookUser); 
    }
}
