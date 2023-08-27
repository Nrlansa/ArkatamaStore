@extends('welcome')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
            <a href="" class="float-end close" data-dismiss="alert" aria-lable="close"
                style="text-decoration: none;">&times;</a>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Dashboard</h4>
        </div>
    </div>
@endsection