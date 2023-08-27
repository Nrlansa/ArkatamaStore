@extends('welcome')
@section('content')
<a href="{{ url('/produk') }}" class="btn btn-primary mb-2">
    <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Edit Data Produk
        </div>
    </div>
    <div class="card-body">
        <form action="{{ url('/produk/'.$produk->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Nama Produk</label>
                        <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" value="{{ $produk->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Kategori Produk</label>
                        <select name="id_kategori" id="" class="form-control @error('id_kategori') is-invalid @enderror">
                            <option selected disabled>Pilih Kategori</option>
                            @foreach ($list_kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->id_kategori ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Deskripsi Produk</label>
                        <textarea type="text" name="deskripsi" id="" class="form-control @error('deskripsi') is-invalid @enderror">{{ $produk->deskripsi }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Harga</label>
                        <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{ $produk->price }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Berat</label>
                        <input type="text" name="berat" id="" class="form-control @error('berat') is-invalid @enderror" value="{{ $produk->berat }}">
                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Stok</label>
                        <input type="text" name="stok" id="" class="form-control @error('stok') is-invalid @enderror" value="{{ $produk->stok }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="control-label">Gambar Produk</label>
                        <input type="file" accept=".jpg" name="gambar" id="" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="status" value="{{ $produk->status }}">
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary float-md-right float-right" onclick="return confirm('Apakah Anda yakin ingin mengubah data ini?')">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
