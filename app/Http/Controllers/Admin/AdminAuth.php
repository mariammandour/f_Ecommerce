<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('Admin/login');
    }

    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('Admin');
        } else
            session()->flash('error', 'check your information');
        return redirect()->back();
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('Admin/login');
    }
}
