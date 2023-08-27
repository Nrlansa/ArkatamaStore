@extends('landing.home')

@section('content')
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="order-details-wrapper">
                        <h2>Daftar Pembayaran Anda</h2>
                        @if (count($order) > 0)
                            @foreach ($order as $item)
                                @if ($item->status === 'Terverifikasi')
                                <div class="order-details">
                                    <ul>
                                        <li>
                                            <p>Nomor Pesanan:</p>
                                            <p>{{ $item->nomor_orderan }}</p>
                                        </li>
                                        <li>
                                            <p>Status Pesanan:</p>
                                            <p>{{ $item->status }}</p>
                                        </li>
                                        <li>
                                            <p>Tanggal Pesanan:</p>
                                            <p>{{ $item->formatted_created_at }}</p>
                                        </li>
                                        <li>
                                            <p>Total Tagihan:</p>
                                            <p>{{ 'Rp ' . number_format($item->total_amount, 2, ',', '.') }}</p>
                                        </li>
                                        <li>
                                            
                                                @if ($item->pembayaran && $item->pembayaran->pengiriman && $item->pembayaran->pengiriman->status_pengiriman === 'Telah dikirim')
                                                    <p class="strong mb-3">Pesanan Anda telah dikirim</p>
                                                @else
                                                    <p class="strong mb-3">Harap tunggu pesanan Anda pindah ke menu dikirim</p>
                                                @endif
                                            
                                        </li>
                                    </ul>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
