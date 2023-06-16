<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(){
        $data['list_user'] = User::all();
        return view('admin.user.index', $data);
    }
    public function create()
    {
       
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'nomorhp' => 'required|regex:/^08[0-9]{8,15}$/',
            'role' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'nomorhp.required' => 'Nomor HP harus diisi.',
            'nomorhp.regex' => 'Format nomor HP harus dimulai dengan "08" dan terdiri dari 10 hingga 15 digit angka.',
            'role.required' => 'Role harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->nomorhp = $request->nomorhp;
        $user->password = $request->password;

        $user->save();

        return redirect('/user')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        
        $data['user'] = $user;
        return view('admin.user.edit', $data);
    }
    public function show(User $user)
    {
        
        $data['user'] = $user;
        return view('admin.user.show', $data);
    }


    public function update(User $user, Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'nomorhp' => 'required|regex:/^08[0-9]{8,15}$/',
            'role' => 'required',
        ], [
            'username.required' => 'Username harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'nomorhp.required' => 'Nomor HP harus diisi.',
            'nomorhp.regex' => 'Format nomor HP harus dimulai dengan "08" dan terdiri dari 10 hingga 15 digit angka.',
            'role.required' => 'Role harus diisi.'
        ]);

        $user->username = request('username');
        $user->nama = request('nama');
        $user->email = request('email');
        $user->role = request('role');
        $user->nomorhp = request('nomorhp');
        if (request('password')) $user->password = request('password');
        $user->save();
        return redirect('/user')->with('success', 'Data berhasil diedit');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('success', 'Data berhasil dihapus');
    }

}
