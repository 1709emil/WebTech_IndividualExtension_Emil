<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function authenticate(Request $request): RedirectResponse
    {
    $credentials = $request->validate ([
        'email'=> ['required', 'email'],
        'password' => ['required']
    ]);

    if(Auth::attempt($credentials)){
        $url = route('home');
        $request->session()->regenerate();
        return redirect($url);
    }
    return back()->withErrors([
        'email'=>'The provided email does not match our records',
    ])->onlyInput('email');
    }


}
