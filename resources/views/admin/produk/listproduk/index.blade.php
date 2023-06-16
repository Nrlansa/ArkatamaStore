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
                        <h4>Data Produk</h4>
                    </div>
                    <div class="col-4 col-md-6">
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end">
                            <a href="{{ url('/produk/create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus mx-2 "></i>Tambah
                                Data Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th>dibuat oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_produk as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('/produk', $produk->id) }}" class="btn btn-primary"><i
                                            class="fas fa-info"></i></a>
                                    <a href="{{ url('/produk', $produk->id) }}/edit" class="btn btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                    <form action="{{ url('/produk', $produk->id) }}" method="POST"
                                        onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('delete ')
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->kategori->nama }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>{{ $produk->formatted_price }}</td>
                            <td> @if ($produk->berat >= 1000)
                                        {{ number_format($produk->berat / 1000, 1, ',', '.') }} kg 
                                    @else
                                        {{ $produk->berat }} gram 
                                    @endif
                            </td>
                            <td style="color:
                                @if ($produk->status === 'disetujui')
                                    rgb(1, 220, 1)
                                @elseif ($produk->status === 'menunggu')
                                    rgb(239, 239, 40)
                                @else
                                    red
                                @endif">
                                <strong>{{ $produk->status }}</strong>
                            </td>
                            <td>{{ $produk->createdBy->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
