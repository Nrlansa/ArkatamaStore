
@extends('landing.home')

<style>
    div.order-details-wrapper h2 {
    text-transform: capitalize;
}
</style>
@section('content')
<div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-12 col-12 mb-30">
                    
                    <div class="order-details-wrapper">
                        <h2>Nomor orderan : {{ $order->nomor_orderan }}</h2>
                        
                        <div class="order-details">
                            <form action="{{ route('belumbayar.belumbayar') }}" method="get">
                                @csrf
                                <ul>
                                    <li><p class="strong">produk</p><p class="strong">total</p></li>
                                    @foreach ($order->items as $item)
                                        <li><p>{{ $item->produk->nama }} x{{ $item->kuantiti }}</p><p>{{ 'Rp ' . number_format($item->produk->price, 2, ',', '.') }}</p></li>
                                    @endforeach
                                    <li><p class="strong">Harga total</p><p class="strong">{{ 'Rp ' . number_format($order->total_amount, 2, ',', '.') }}</p></li>
                                    <li><p class="strong">Bayar ke rekening </p><p class="strong"> BNI: 028131031</p></li>
                                    <li><p class="strong" style="color: white">-</p><p class="strong"> BRI: 028131031</p></li>
                                    <li><p class="strong" style="color: white">-</p><p class="strong"> Mega: 028131031</p></li>
                                    <li><p class="strong" style="color: white">-</p><p class="strong"> BSI: 028131031</p></li>
                                    <li><p style="color: red; font-size:14px;" class="strong">Harap unduh bukti pesanan, jangan lupa untuk mengklik pembayaran jika telah mengunduh bukti pesanan</p></li>
                                    <div class="d-grid gap-2 d-md-block m-4 pt-2">
                                        <button class=" button btn btn-primary">pembayaran</button>
                                        <button class="btn btn-primary" type="button"><a href="{{ url('/order/' . $order->id . '/unduh-pdf') }}" target="_blank">Unduh Bukti Pesanan</a></button>
                                    </div>
                                </ul>

                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
</div>
@endsection
