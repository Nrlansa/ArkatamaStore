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
                        <h4>Data slider</h4>
                    </div>
                    <div class="col-4 col-md-6">
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Slider
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
                            <th>Nama</th>
                            <th>Banner</th>
                            <th>Status banner</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($list_slider as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/slider', $slider->id) }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                        @if ($slider->is_active === 'menunggu')
                                             <a href="{{ url('/slider', $slider->id) }}/edit" class="btn btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#editModal{{ $slider->id }}">
                                            <i class="fas fa-edit"></i>
                                             </a>
                                        @endif

                                        @if ($slider->is_active === 'tidak' || $slider->is_active === 'menunggu')
                                            <form action="{{ url('/slider', $slider->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $slider->nama }}</td>
                                <td> <img src="{{ url('public/' . $slider->banner) }}" alt="Gambar Produk" style="max-width: 65%;"></td>
                                <td style="color:
                                @if ($slider->is_active === 'aktif')
                                    rgb(1, 220, 1)
                                @elseif ($slider->is_active === 'menunggu')
                                    rgb(239, 239, 40)
                                @else
                                    red
                                @endif">
                                <strong>{{ $slider->is_active }}</strong>
                            </td>
                            </tr>
                             <!-- Modal edit -->
                            <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data slider</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/slider',  $slider->id ) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Nama Slider</label>
                                                            <input type="text" name="nama" id="" class="form-control" value="{{ $slider->nama }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Banner</label>
                                                            <input type="file" accept=".png"  name="banner" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="is_active" value="menunggu">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/slider') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Slider</label>
                                    <input type="text" name="nama" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Banner</label>
                                    <input type="file" accept=".png"  name="banner" id="" class="form-control" required>
                                </div>
                            </div>
                            <input type="hidden" name="is_active" value="menunggu">
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
