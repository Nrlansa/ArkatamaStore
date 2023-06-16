<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function login()
    {
        return view('admin.auth.login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    function proses_login(Request $request)
    {
        if (Auth()->attempt(['username' => request('username'), 'password' => request('password')])) {
            $hakAkses = Auth::user()->role;
            if ($hakAkses == "admin") {
                return redirect('dashboard')->with('success', 'Login berhasil');
            } elseif ($hakAkses == "staff") {
                return redirect('staffdashboard')->with('success', 'Login berhasil');
            } elseif ($hakAkses == "user") {
                return redirect('/')->with('success', 'Login berhasil');
            } else {
                return redirect('login')->with('error', 'Akses tidak valid');
            }
        }

        return back()->with('danger', 'login gagal, silahkan cek username dan password anda');
    }

    public function daftar()
    {
        return view('admin.auth.registrasi');
    }
    public function daftarshow(){
            $user= new User();
            $user-> nama = request('nama');
            $user-> username = request('username');
            $user-> email = request('email');
            $user-> password = request('password');
            $user-> nomorhp = request('nomorhp');
            $user-> role = request('role');
            // @dd($user);
            $user->save();

            return redirect('login')->with('success', 'Registration Succesfull! Please Login');
        }


}
