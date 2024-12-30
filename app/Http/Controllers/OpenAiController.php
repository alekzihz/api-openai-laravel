<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenAiController extends Controller
{
    //

    public function index()
    {
        return response()->json(['message' => 'Hello OpenAITEST']);
    }
}
