@extends('welcome')

@section('content')
    <a href="{{ url('/user') }}" class="btn btn-primary mb-2">
        <i class="fas fa-arrow-left mx-2"></i>Kembali
    </a>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Tambah data User
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('/user') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="nomorhp" class="control-label">No WhatsApp</label>
                            <input type="text" name="nomorhp" id="nomorhp" class="form-control @error('nomorhp') is-invalid @enderror">
                            @error('nomorhp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="role" class="control-label">Role</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                <option selected disabled>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-primary float-md-right float-right" onclick="return confirm('Apakah Anda yakin ingin menambah data ini?')">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
