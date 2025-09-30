<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Auth\CreateSessionCookie\FailedToCreateSessionCookie;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

     public function redirectToGoogle()
     {
         $client = new Google_Client();
         $client->setClientId(env('GOOGLE_CLIENT_ID'));
         $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
         $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
         $client->addScope('email');
         $client->addScope('profile');
 
         return redirect($client->createAuthUrl());
     }

     public function handleGoogleCallback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));

        $service = new Google_Service_Oauth2($client);
        $user = $service->userinfo->get();
        $email = $user->email;
        $u = User::where('email', $email)->first();
        //dd($user);
        if(!$u) {
            $u = new User;
            $u->email = $email;
            $u->type = "customer";
            $u->name = $user->name;
            $u->verified = "true";
            $u->save();
        }

        Auth::login($u);

        return redirect('/manage');
    }

    public function login(){
        if(Auth::check()){
            return redirect("/manage");
        } else {
            return view('login');
        }
    }

    public function signup(){
        if(Auth::check()){
            return redirect("/manage");
        } else {
            return view('login');
        }
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/manage');
        }

        return redirect()->back()->with('failed', 'Invalid email or password')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userProperties = [
            'email' => $validatedData['email'],
            'emailVerified' => false,
            'displayName' => $validatedData['name'],
            'password' => $validatedData['password'],
            'disabled' => false,
        ];

        $firebaseAuth = app('firebaseauth');
        try {
            $userRecord = $firebaseAuth->createUser($userProperties);

            if ($userRecord instanceof \Kreait\Firebase\Auth\UserRecord) {
                $firebaseAuth->sendEmailVerificationLink($validatedData['email']);

                $u = User::where('email', $validatedData['email'])->first();
                if(!$u) {
                    $u = new User;
                    $u->email = $validatedData['email'];
                    $u->type = "customer";
                    $u->name = $validatedData['name'];
                    $u->localId = $userRecord->uid;
                    $u->verified = "false";
                    $u->save();
                }

                Auth::login($u);

                return redirect('/manage');
            } else {
                $errorMessage = 'Unexpected error occurred while creating user';
                return redirect()->back()->with('failed', $errorMessage)->withInput();
            }
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('failed', $errorMessage)->withInput();
        }
    }
}