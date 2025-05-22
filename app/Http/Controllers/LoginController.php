<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function admin()
    {
        return view('admin.login');
    }

    public function mahasiswa()
    {
        return view('login-form');
    }
}

