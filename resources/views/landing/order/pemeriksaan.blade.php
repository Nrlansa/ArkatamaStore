@extends('landing.home')

@section('content')
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="order-details-wrapper">
                        <h2>Daftar pembayaran anda yang sedang diproses</h2>
                        @if (count($order) > 0)
                            @foreach ($order as $item)
                                @if ($item->status === 'menunggu verifikasi')
                                    <div class="order-details">
                                        <ul>
                                            <li>
                                                <p>Nomor Pesanan :</p>
                                                <p>{{ $item->nomor_orderan }}</p>
                                            </li>
                                            <li>
                                                <p>Status Pesanan :</p>
                                                <p> {{ $item->status }}</p>
                                            </li>
                                            <li>
                                                <p>Tanggal Pesanan :</p>
                                                <p> {{ $item->formatted_created_at }}</p>
                                            </li>
                                            <li>
                                                <p>Total Tagihan :</p>
                                                <p>{{ 'Rp ' . number_format($item->total_amount, 2, ',', '.') }}</p>
                                            </li>
                                            @elseif ( $item->status === 'tidak valid')
                                            <li>
                                                <p>Upload bukti:</p>
                                                <p>
                                                    <form action="{{ route('upload.bukti_bayar', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="bukti_bayar" accept="image/jpeg">
                                                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                                        <button type="submit" class="button">Unggah bukti</button>
                                                    </form>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="strong mb-3">Segera bayar pesanan anda sebelum 24 jam</p>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach

                            @if ($item->status === 'Dalam Proses Pembayaran' && $item->status === 'menunggu verifikasi')
                                <div class="order-details">
                                    <p style="text-align: center">Anda tidak memiliki barang yang belum dibayar</p>
                                </div>
                            @endif
                        @else
                            <div class="order-details">
                                <p style="text-align: center">Anda tidak memiliki barang yang belum dibayarr</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
