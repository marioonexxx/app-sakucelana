<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInventarisController extends Controller
{
    public function index()
    {
        return view('user-inventaris.dashboard');
    }
}
