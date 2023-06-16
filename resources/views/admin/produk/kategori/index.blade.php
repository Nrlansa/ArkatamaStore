@extends('welcome')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
            <a href="" class="float-end close" data-dismiss="alert" aria-lable="close"
                style="text-decoration: none;">&times;</a>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-6">
                        <h4>Data Kategori</h4>
                    </div>
                    <div class="col-4 col-md-6">
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Kategori
                            </button>
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
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_kategori as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/produk/kategori', $kategori->id) }}/edit" class="btn btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#editModal{{ $kategori->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/produk/kategori', $kategori->id) }}" method="POST"
                                            onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{ $kategori->nama }}</td>
                            </tr>
                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal{{ $kategori->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/produk/kategori', $kategori->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Kategori</label>
                                                            <input type="text" name="nama" id="" class="form-control" value="{{ $kategori->nama }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary float-md-right float-right"
                                                        onclick="return confirm('apakah anda yakin ingin mengedit data ini?')">
                                                        <i class="fa fa-save mx-2"></i> Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="modal fade" id="editModal{{ $kategori->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/kategori', $kategori->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Kategori</label>
                                                            <input type="text" name="name" id=""
                                                                class="form-control" value="{{ $kategori->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary float-md-right float-right"
                                                        onclick="return confirm('apakah anda yakin ingin mengedit data ini?')">
                                                        <i class="fa fa-save mx-2"></i> Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Modal tambah-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/produk/kategori') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Kategori</label>
                                    <input type="text" name="nama" id="" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary float-md-right float-right"
                                onclick="return confirm('apakah anda yakin ingin menambah data ini?')">
                                <i class="fa fa-save mx-2"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

