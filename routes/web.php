<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LogoutController;
    use Illuminate\Support\Facades\Auth;


    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */


    /*Route::get('/', function () {
        return view('welcome');
    });*/

    Route::get('/',
        [HomeController::class, 'getDominios']
    )->middleware(['auth'])->name('dashboard');


    Route::get('/dashboard', [HomeController::class, 'getDominios'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect('/dashboard');
        }


        return view('auth.login');
    })->name('login');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
