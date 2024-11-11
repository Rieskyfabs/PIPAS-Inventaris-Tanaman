<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

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
        // Validasi input login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::warning('Validasi Gagal', 'Mohon periksa kembali email dan password Anda.');
            return back()->withErrors($validator)->withInput();
        }

        // Attempt login dengan throttle untuk mencegah brute force
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek apakah status user aktif
            if ($user->status !== 'active') {
                Auth::logout();
                Alert::warning('Tidak Bisa Login', 'Akun Anda tidak aktif, hubungi Administrator.');
                return back()->withInput();
            }

            Alert::success('Login Berhasil!', 'Selamat datang di dashboard anda.');

            // Redirect ke halaman yang sesuai berdasarkan role
            if ($user->role->name === 'master' || $user->role->name === 'admin') {
                return redirect()->route('admin/dashboard');
            }

            return redirect()->route('dashboard');
        }

        // Jika login gagal
        Log::warning('Login attempt failed for email: ' . $request->input('email'));
        Alert::warning('Login Gagal', 'Email atau password salah.');
        return back()->withInput();
    }

    public function logout(Request $request)
    {
        // Logout dan invalidate session
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::info('Anda Logout', 'Terimakasih telah berkunjung!');
        return redirect()->route('home');
    }
}
