<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dominio;

class HomeController extends Controller
{
    //

    public function getDominios()
    {
        $dominios = Dominio::all();
        return view('welcome', data: ['dominios' => $dominios]);
    }
}
