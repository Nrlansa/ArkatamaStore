<?php

namespace App\Http\Controllers;

use App\Models\Member;
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

    // function proses_login(Request $request)
    // {
    //     if (Auth()->attempt(['username' => request('username'), 'password' => request('password')])) {
    //         $hakAkses = Auth::user()->role;
    //         if ($hakAkses == "admin") {
    //             return redirect('dashboard')->with('success', 'Login berhasil');
    //         } elseif ($hakAkses == "staff") {
    //             return redirect('staffdashboard')->with('success', 'Login berhasil');
    //         } elseif ($hakAkses == "user") {
    //             return redirect('')->with('success', 'Login berhasil');
    //         } else {
    //             return redirect('login')->with('error', 'Akses tidak valid');
    //         }
    //     }

    //     return back()->with('danger', 'login gagal, silahkan cek username dan password anda');
    // }
    function proses_login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
           
            $hakAkses = Auth::user()->role;
            if ($hakAkses == "admin") {
                return redirect('dashboard')->with('success', 'Login berhasil');
            } elseif ($hakAkses == "staff") {
                return redirect('staffdashboard')->with('success', 'Login berhasil');
            } else {
                return redirect('login')->with('error', 'Akses tidak valid');
            }
        } elseif (Auth::guard('member')->attempt($credentials)) {
            
            return redirect('/listproduk')->with('success', 'Login berhasil');
        }

        return back()->with('danger', 'Login gagal, silahkan cek username dan password anda');
    }

    public function daftar()
    {
        return view('admin.auth.registrasi');
    }
    public function daftarshow(){
            $user= new  Member();
            $user-> nama = request('nama');
            $user-> username = request('username');
            $user-> email = request('email');
            $user-> password = request('password');
            $user-> no_hp = request('no_hp');
            $user->alamat = request('alamat');
            // @dd($user);
            $user->save();

            return redirect('login')->with('success', 'Registrasi Berhasil, Silahkan login');
        }


}
