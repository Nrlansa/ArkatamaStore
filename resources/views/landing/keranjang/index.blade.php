@extends('landing.home')

@section('content')
 <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   
                    <div class="table-responsive mb-30">
                        <table class="table cart-table text-center"> 
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th class="number">No.</th>
                                    <th class="image">Gambar</th>
                                    <th class="name">Nama Produk</th>
                                    <th class="name">Berat</th>
                                    <th class="qty">Jumlah</th>
                                    <th class="price">Harga</th>
                                    <th class="total">total</th>
                                    <th class="remove">remove</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                 @if (count($keranjang) > 0)
                                    @foreach ($keranjang as $item)
                                        <tr>
                                            <td><span class="cart-number">{{ $loop->iteration }}</span></td>
                                            <td><a href="#" class="cart-pro-image"><img src="{{ url('public/' . $item->produk->gambar) }}" alt="gambar" width="190" height="100"/></a></td>
                                            <td><a href="#" class="cart-pro-title">{{ $item->produk->nama }}</a></td>
                                            <td><p class="cart-pro-price">
                                            @if ( $item->produk->berat >= 1000)
                                                {{ number_format($produk->berat / 1000, 1, ',', '.') }} kg 
                                            @else
                                                {{  $item->produk->berat }} gram 
                                            @endif
                                            </p></td>
                                            <td><a href="#" class="cart-pro-title">{{ $item->total_jumlah }}</a></td>
                                            <td><p class="cart-pro-price">{{ $item->produk->formatted_price }}</p></td>
                                            <td><p class="cart-price-total">{{ 'Rp ' . number_format($item->total_price, 2, ',', '.') }}</p></td>
                                            <td>
                                                <form action="{{ route('keranjang.delete', $item->produk->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="cart-pro-remove"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="m-3 p-3">Keranjang anda kosong, silahkan kembali berbelanja...</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                       
                        <!-- Cart Action -->
                        <div class="cart-action col-lg-4 col-md-6 col-12 mb-30">
                            <a href="{{ url('/listproduk') }}" class="button">Kembali Berbelanja</a>
                        </div>
                        
                        <!-- Cart Cuppon -->
                        <div class="cart-cuppon col-lg-4 col-md-6 col-12 mb-30">
                            
                        </div>
                        
                        <!-- Cart Checkout Progress -->
                        <div class="cart-checkout-process col-lg-4 col-md-6 col-12 mb-30">
                            <h4 class="title">Proses barang </h4>
                            <p><span>Subtotal</span><span>{{ 'Rp ' . number_format($subtotal, 2, ',', '.') }}</span></p>
                           <form action="{{ route('order.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="button">proses pembelian barang</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</div>
@endsection
