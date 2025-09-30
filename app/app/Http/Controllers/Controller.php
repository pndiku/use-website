<?php

namespace App\Http\Controllers;

use Redirect;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;
use DB;
use DateTime;
use Validator;
use App\Rules\Turnstile;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showLogin()
	{
 
		return view('login');
	}
 
	public function doLogout()
	{
		Auth::logout(); // logging out user
		return Redirect::to('/login'); // redirection to login screen
	}
 
	public function doLogin(Request $request)
	{
 
		// Creating Rules for Email and Password
 
		$rules = array(
			'email' => 'required', // make sure the email is an actual email
			'password' => 'required'); //'cf-turnstile-response' => ['required', new Turnstile]);
 
			// password has to be greater than 3 characters and can only be alphanumeric and);
			// checking all field
 
			$validator = Validator::make(request()->all(), $rules);
 
			// if the validator fails, redirect back to the form
 
			if ($validator->fails())
				{
                    return redirect('/login')
                    ->withErrors($validator)
                    ->withInput(request()->except('password'));
				}
			  else
				{
 
				// create our user data for the authentication
 
				$userdata = [
                    'email' => request('email'),
                    'password' => request('password')
                ];
 
				// attempt to do the login
				//dd(Auth::attempt($userdata));
 
				if (Auth::attempt($userdata))
					{
 
					// validation successful
					// do whatever you want on success
						if(Auth::user()->status == 'Pending'){
										    Auth::logout();
							           return redirect()->back()->with('info', 'Your account is pending verification, please check in a moment');
						} else {
							//return Redirect::to('/servers');
							return redirect()->intended('/manage');

						}
						
					}
				  else
					{
 
					// validation not successful, send back to form

					$errors = ["failed" => "Authentication Failed! Try Again"];
 
					return Redirect::to('/login')->withErrors($errors);
				}
		}
	}



	public function createUser(Request $request){

        //$name = $request['name'] ;
        $username = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];

        $pass1 = $request['password'];
        $pass2 = $request['password2'];

		$rules = array(
			'email' => 'required', // make sure the email is an actual email
			'phone' => ['required', 'regex:/^07\d{8}$/'],
			'password' => 'required', 'cf-turnstile-response' => ['required', new Turnstile]);

			$validator = Validator::make(request()->all(), $rules);
 
			// if the validator fails, redirect back to the form
 
			if ($validator->fails())
				{
                    return redirect('/register')
                    ->withErrors($validator)
                    ->withInput(request()->except('password'));
				}

        if($pass1 != $pass2){
           return redirect()->back()->with('failed', 'Your passwords do not match! Please make sure these match')->withInput(request()->except('password')); 
        }

        $password = Hash::make($request['password']);
        $role = 'User';

        $one = new DateTime();

        $remembertoken = uniqid().uniqid();
        
        $result = DB::insert('insert into user (name, email, phone, password, role, created_at, updated_at) values(?,?,?,?,?,?,?)',[$username, $email, $phone, $password, $role, $one, $one]);

        //dd($result);

        if($result){
           return redirect()->back()->with('success', 'Your account has been created successfully and is being verified. <a href="/login">Login</a>');
        } else {
           return redirect()->back()->with('failed', 'Failed to create user, try again!');
        }
        
    }




}
