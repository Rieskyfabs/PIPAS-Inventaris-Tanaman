<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::warning('Validasi Gagal', 'Mohon periksa kembali email dan password Anda.');
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            Log::warning('Login attempt failed for email: ' . $request->input('email'));
            Alert::warning('Login Gagal', 'Nampaknya anda memasukkan email atau password yang salah.');
            return back()->withInput();
        }

        $user = Auth::user();

        if ($user->status !== 'active') {
            Auth::logout();
            Alert::warning('Tidak Bisa Login', 'Akun Anda tidak aktif, hubungi Administrator untuk bantuan lebih lanjut.');
            return back()->withInput();
        }

        $request->session()->regenerate();

        Alert::success('Login Berhasil!', 'Selamat datang di dashboard anda.');

        if ($user->role_id === Role::where('name', 'master')->first()->id) {
            return redirect()->route('admin/dashboard');
        } elseif ($user->role_id === Role::where('name', 'admin')->first()->id) {
            return redirect()->route('admin/dashboard');
        } else {
            return redirect()->route('dashboard');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::info('Anda Logout', 'Terimakasih telah berkunjung!');

        return redirect()->route('home');
    }
}

