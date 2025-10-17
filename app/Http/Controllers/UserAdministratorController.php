<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdministratorController extends Controller
{
    public function index()
    {
        return view('user-administrator.dashboard');
    }
}
