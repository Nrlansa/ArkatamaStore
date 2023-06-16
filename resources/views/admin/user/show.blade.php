@extends('welcome')
@section('content')
 @if(count($errors)>0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
            <a href="" class="float-end close" data-dismiss="alert" aria-lable="close" style="text-decoration: none;">&times;</a>
        </div>        
    @endif
<a href="{{ url('/user') }}" class="btn btn-primary mb-2">
        <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>
    <div class="card">
        <h5 class="card-header">Detail User</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p>Nama Lengkap:{{ $user->nama }}</p>  
                    <p>Username: {{ $user->username }}</p>  
                    <p>Email: {{ $user->email }}</p>
                </div>
                <div class="col-6">
                    <p>Nomor WhatsApp: {{ $user->nomorhp }}</p>
                    <p>Role: {{ $user->role }} </p>  
                </div>
            </div>      
        </div>
    </div>
@endsection
        