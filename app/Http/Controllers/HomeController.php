<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {


        return view('dashboard');
    }
    public function index()
    {
        return view('acceuil');
    }
}
