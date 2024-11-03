<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AdminAuthController extends Controller
{
    //
    function index()
    {
        return view('admin.auth.login');
    }

    function doLogin(request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        }

        return back()->with('loginError', 'Email atau password salah');
    }
    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }
}
