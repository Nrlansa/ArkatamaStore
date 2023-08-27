@extends('landing.home')

@section('content')
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="order-details-wrapper">
                        <h2>Daftar Pembayaran anda</h2>
                        @if (count($order) > 0)
                            @foreach ($order as $item)
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
                                       @if ($item->status === 'menunggu verifikasi')
                                            <li>
                                                <p class="strong mb-3">Harap menunggu hingga status pesanan anda menjadi "Terverifikasi"</p>
                                            </li>
                                        @elseif ($item->status === 'Dalam Proses Pembayaran' || $item->status === 'tidak valid')
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
                                        @elseif ($item->status === 'Pesanan Dibatalkan')
                                            <li>
                                                <p class="strong mb-3">Pesanan Anda telah dibatalkan secara otomatis karena tidak melakukan pembayaran lebih dari 24 jam.</p>
                                            </li>
                                        @else
                                            <li>
                                                <p class="strong mb-3">Terima kasih, pesanan anda akan kami antar menggunakan kurir.</p>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <div class="order-details">
                                <tr>
                                    <td>
                                        <p style="text-align: center">Anda tidak memiliki barang yang belum dibayar</p>
                                    </td>
                                </tr>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
