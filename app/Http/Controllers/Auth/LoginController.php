<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {


        $credentials = $request->only('email', 'password');

        //print_r(value: $credentials);
        //return response()->json(['message' => 'Login failed']);

        $email = $credentials['email'];
        $password = $credentials['password'];

        $verifyEmail = User::where('email', $email)->first();

        if (!$verifyEmail) {
            return response()->json(['message' => 'Email not found']);
        }

        if (base64_decode($verifyEmail->password) == $password) {

            Auth::login($verifyEmail);

            //print_r(Auth::user());
            //return response()->json(['message' => 'Login success']);
            return redirect('/dashboard');
        }


        return response()->json(['message' => 'Login failed']);







        //$password = $credentials['password'];


        /*if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(['message' => 'Login success']);
        }*/

        //return response()->json(['message' => 'Login failed']);
    }
}
