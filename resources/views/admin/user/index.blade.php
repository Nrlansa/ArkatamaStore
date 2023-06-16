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
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-6">
                        <h4>Data User</h4>
                    </div>
                    <div class="col-4 col-md-6">
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end">
                            <a href="{{ url('/user/create') }}" class="btn btn-primary"><i class="fa fa-plus mx-2 "></i>Tambah
                                Data User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_user as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/user', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-info"></i></a>
                                        <a href="{{ url('/user', $user->id) }}/edit" class="btn btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ url('/user', $user->id) }}" method="POST"
                                            onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('delete ')
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
