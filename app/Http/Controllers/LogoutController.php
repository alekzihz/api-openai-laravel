<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LogoutController extends Controller
    {

        public function logout(Request $request)
        {
            Auth::logout();
            request()->session()->invalidate();            // Invalida la sesión actual
            request()->session()->regenerateToken();       // Regenera el token CSRF
            return redirect('/login');
        }
        //
    }
