<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        //validated request
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        //check validated data with attempt
        if (Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login Succesfull');
        } else {
            return back()->with('error', 'Login Fail');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
