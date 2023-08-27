@extends('landing.home')

@section('content')
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="order-details-wrapper">
                        <h2>Daftar pesanan terkirim</h2>
                        @if (count($order) > 0)
                            @foreach ($order as $item)
                                @if ($item->status === 'Terverifikasi')
                                    <div class="order-details">
                                        <ul>
                                            <li>
                                                <p>Nomor Pesanan :</p>
                                                <p>{{ $item->nomor_orderan }}</p>
                                            </li>
                                            <li>
                                                <p>Status Pesanan :</p>
                                                
                                                    <p>{{ $item->pembayaran->pengiriman->status_pengiriman }}</p>
                                               
                                            </li>
                                            <li>
                                                <p>Tanggal Pesanan :</p>
                                                <p> {{  \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd, D MMMM Y HH:mm:ss') }}</p>
                                            </li>
                                            <li>
                                                <p>Total Tagihan :</p>
                                                <p>{{ 'Rp ' . number_format($item->total_amount, 2, ',', '.') }}</p>
                                            </li>
                                           <li>
                                                <p>Tanggal Pengiriman :</p>
                                                <p> {{ \Carbon\Carbon::parse($item->pembayaran->pengiriman->tanggal_pengiriman)->locale('id')->isoFormat('dddd, D MMMM Y HH:mm:ss') }}</p>
                                            </li>
                                            <li>
                                                <p>Upload bukti barang telah sampai:</p>
                                                <p>
                                                    <form action="{{ route('upload.pengiriman', $item->id) }}" method="POST">
                                                        @csrf
                                                        <input type="file" name="bukti_pengiriman" accept="image/jpeg">
                                                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                                        <button type="submit" class="button">Unggah bukti</button>
                                                    </form>
                                                </p>
                                            </li>
                                            <li>
                                                <p>Barang tidak sampai</p>
                                                <p>
                                                    <form action="{{ route('upload.pengiriman', $item->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden"  name="status_pengiriman" value="barang tidak sampai">
                                                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                                        <button type="submit" class="button">Ajukan Pengembalian</button>
                                                    </form>
                                                </p>
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
