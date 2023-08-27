@extends('landing.home')
@section('content')
    @include('landing.template.slider')
    <div class="product-section section pt-70 pb-60">
        <div class="container">

            <!-- Section Title Start-->
            <div class="row">
                <div class=" text-center col mb-60">
                    <h1>Produk Teratas</h1>
                </div>
            </div><!-- Section Title End-->

            
            <div class="container">
                <div class="row col-12">
                    <div class="row">
                        @foreach ($list_produk as $produk)
                            @if ($produk->status === 'disetujui')
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ url('public/' . $produk->gambar) }}" class="card-img-top" alt="Product"
                                            width="150px" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="{{ url('/detailproduk', $produk->id) }}">{{ $produk->nama }}</a>
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
