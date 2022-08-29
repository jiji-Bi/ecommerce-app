<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcomepage()
    {
        return redirect('welcome');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
