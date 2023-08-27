@extends('landing.home')
@section('content')
 <!-- Page Banner Section Start-->
    <div class="page-banner-section section" style="background-image: url('../public/assetecom/img/bg/detail.png')">
        <div class="container">
            <div class="row">
                
                <!-- Page Title Start -->
                <div class="page-title text-center col">
                    <h1>Product details</h1>
                </div><!-- Page Title End -->
                
            </div>
        </div>
    </div><!-- Page Banner Section End-->
    
       
    <!-- Product Section Start-->
    <div class="product-section section pt-110 pb-90">
        <div class="container">
            
            <!-- Product Wrapper Start-->
            <div class="row">
                
                <!-- Product Image & Thumbnail Start -->
                <div class="col-lg-7 col-12 mb-30">
                   
                    <!-- Product Thumbnail -->
                    <div class="single-product-thumbnail product-thumbnail-slider float-left">
                        
                    </div>
                    
                    <!-- Product Image -->
                    <div class="single-product-image product-image-slider fix">
                    <div class="single-image"><img src="{{ url('public/' .$produk->gambar) }}" class="product-image"
                                    alt="Product Image" width="500px" height="550px"></div>
                    </div>
                    
                </div><!-- Product Image & Thumbnail End -->
                
                <!-- Product Content Start -->
                <div class="single-product-content col-lg-5 col-12 mb-30">
                   
                    <!-- Title -->
                    <h1 class="title">{{ $produk->nama }}</h1>
                    
                    
                    <!-- Product Rating -->
                    <span class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                    
                    <!-- Price -->
                    <span class="product-price">{{ $produk->formatted_price }}</span>
                    
                    <!-- Description -->
                    <div class="description">
                        <p>{{ $produk->deskripsi }}</p>
                        <p>Stok barang: {{ $produk->stok }}</p>
                    </div>
                    
                    <!-- Quantity & Cart Button -->
                    @if (Auth::check())
                        @if ($produk->stok > 0)
                            <form action="{{ route('keranjang.add') }}" method="POST">
                                @csrf
                                <div class="product-quantity-cart fix d-flex">
                                    <div class="col-3">
                                        <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                                        <input type="number" class="form-control mr-2" name="jumlah" min="1" max="{{ $produk->stok }}" value="1">
                                    </div>
                                    <button type="submit" class="add-to-cart">add to cart</button>
                                </div>
                            </form>
                        @else
                            <div class="out-of-stock mb-3"><strong style="color: red;">Stok habis</strong></div>
                        @endif
                    @else
                        <div class="product-quantity-cart fix">
                            <div class="product-quantity">
                                <input type="text" value="0" name="qtybox">
                            </div>
                            <button type="submit" class="add-to-cart"><a href="{{ url('/login') }}">add to cart</a></button>
                        </div>
                    @endif

                    <!-- Action Button -->
                    <div class="product-action-button fix">
                        <button><i class="ion-ios-email-outline"></i>Email to a friend</button>
                        <button><i class="ion-ios-heart-outline"></i>Wishlist</button>
                        <button><i class="ion-ios-printer-outline"></i>Print</button>
                    </div>
                    
                    <!-- Social Share -->
                    <div class="product-share fix">
                        <h6>Share :</h6>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                    
                </div><!-- Product Content End -->
            </div><!-- Product Wrapper End-->
        </div>
    </div><!-- Product Section End-->
@endsection