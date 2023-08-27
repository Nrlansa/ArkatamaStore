<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-solid">
                    <div class="row">
                        <div class="col-12 mt-3 mb-4 mx-2">
                            <a href="{{ url('/listproduk') }}" class="btn btn-primary mb-2">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-header">
                        Detail Produk
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6">
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
                                    <small>Stok barang : {{ $produk->stok }}</small>
                                </h4>
                            </div>

                            <div class="mt-4">
                                <form action="{{ route('keranjang.add') }}" method="POST">
                                    @csrf <!-- Tambahkan token CSRF untuk melindungi formulir -->
                                    <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                                    <div class="d-flex">
                                        <input type="number" class="form-control mr-2" name="jumlah" min="1" max="{{ $produk->stok }}" value="1">
                                        <button type="submit" class="btn btn-primary btn-lg btn-flat">
                                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                            Add to Cart
                                        </button>
                                    </div>
                                </form>
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
{{-- <script>
    $(document).ready(function() {
        $('#add-to-cart-btn').on('click', function() {
            var produkId = $(this).data('produk-id');
            var jumlah = $('#quantity-input').val();
            var userId = $(this).data('user-id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            
            // Lakukan AJAX request untuk menambahkan produk ke keranjang
            $.ajax({
                url: '{{ route('keranjang.add') }}',
                method: 'POST',
                data: {
                    id_produk: produkId,
                    id_user: userId,
                    jumlah: jumlah
                    _token: csrfToken 
                },
                success: function(response) {
                    // Tampilkan pesan sukses atau selesaikan logika lain yang diinginkan
                    alert('Produk berhasil ditambahkan ke keranjang!');
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error atau selesaikan logika lain yang diinginkan
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
                }
            });
        });
    });
</script> --}}


</body>

</html>
