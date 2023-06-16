<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arkatama Store</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/dist/css/adminlte.min.css">
</head>

<body>

<div class="card" id="cardsaye">
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card card-solid">
            <div class="row">
                <div class="col-12 mt-3 mb-4 mx-2">
                    <a href="{{ url('/') }}" class="btn btn-primary mb-2">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-header">
                Detail Produk
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img src="{{ url('public/' .$produk->gambar) }}" class="product-image"
                            alt="Product Image" style="width: 500px; height:250px">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $produk->nama }}</h3>
                    <hr>
                    <h4>{{ $produk->kategori->nama }}</h4>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            {{ $produk->formatted_price }}
                        </h2>
                        <h4 class="mt-0">
                            <small></small>
                        </h4>
                    </div>

                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                        </div>

                        <div class="btn btn-default btn-lg btn-flat">
                            <i class="fas fa-heart fa-lg mr-2"></i>
                            Add to Wishlist
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                
                <div class="tab-content p-3" id="nav-tabContent">
                    <p>Deskripsi</p>
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $produk->deskripsi }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- jQuery -->
    <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public') }}/dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
</body>

</html>
