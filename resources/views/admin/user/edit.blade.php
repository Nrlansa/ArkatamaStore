@extends('welcome')
@section('content')
<a href="{{ url('/user') }}" class="btn btn-primary mb-2">
        <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>
 <div class="card">
        <div class="card-header">
            <div class="card-title">
                Edit Data User
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('/user', $user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="control-label">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" id="" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="control-label">Nama Lengkap</label>
                            <input type="text" name="nama"value="{{ $user->nama }}" id="" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" id="" class="form-control @error('email') is-invalid @enderror" >
                             @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="control-label">Nomor WhatsApp</label>
                            <input type="text" name="nomorhp" value="{{ $user->nomorhp }}" id="" class="form-control  @error('nomorhp') is-invalid @enderror" >
                            @error('nomorhp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="role" value="{{ $user->role }}">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="control-label">Password</label>
                            <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-primary float-md-right float-right" onclick="return confirm('apakah anda yakin ingin menambah data ini?')">
                            simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection