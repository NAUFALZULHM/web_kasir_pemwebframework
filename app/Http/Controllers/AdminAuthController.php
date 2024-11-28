<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if (Auth::check()) {
            return redirect('admin');
        }

        return view('auth.login');
    }

    // Proses login
    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            Alert::success('Sukses', 'Login berhasil');

            // cek role
            if (Auth::user()->role === 'admin') {
                return redirect('admin');
            } else if(Auth::user()->role === 'user') {
                return redirect('/');
            }
        }
        return back()->with('loginError', 'Email atau password salah');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }

    // Menampilkan halaman register
    public function register()
    {
        // Jika sudah login, langsung ke dashboard
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }

        return view('auth.register');
    }

    // Proses registrasi
    public function doRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', // Konfirmasi password
        ]);

        // Enkripsi password
        $data['password'] = bcrypt($data['password']);

        // Simpan user baru
        User::create($data);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
