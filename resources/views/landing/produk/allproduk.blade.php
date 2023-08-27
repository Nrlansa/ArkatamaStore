@extends('landing.home')
@section('content')
    <style>
        .out-of-stock-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
        }
    </style>
    <div class="product-section section pt-70 pb-60">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}, Selamat berbelanja {{ Auth::user()->nama }}
                    <a href="" class="float-end close" data-dismiss="alert" aria-lable="close"
                        style="text-decoration: none;">&times;</a>
                </div>
            @endif
            <div class="container">
                <div class="row col-12">
                    <div class="row">
                        @foreach ($list_produk as $produk)
                            @if ($produk->status === 'disetujui')
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                    <div class="card h-100">
                                        @if ($produk->stok > 0)
                                            <img src="{{ url('public/' . $produk->gambar) }}" class="card-img-top"
                                                alt="Product" width="150px" height="200px">
                                        @else
                                            <div class="position-relative">
                                                <img src="{{ url('public/' . $produk->gambar) }}" class="card-img-top"
                                                    alt="Product" width="150px" height="200px">
                                                <div class="out-of-stock-overlay">Stok Habis</div>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                @if ($produk->stok > 0)
                                                    <a
                                                        href="{{ url('/detailproduk', $produk->id) }}">{{ $produk->nama }}</a>
                                                @else
                                                    {{ $produk->nama }}
                                                @endif
                                            </h5>
                                            <p class="card-text">{{ $produk->kategori->nama }}</p>
                                            <p class="card-text">{{ $produk->formatted_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
