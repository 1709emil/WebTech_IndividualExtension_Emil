<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $url = route('home');
        $User = new User();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        $User->phoneNumber = $request->input('phoneNumber');
        $User->save();
     return redirect($url);
    }

    public function retrieveUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = $request->input('phoneNumber');

    }
}
