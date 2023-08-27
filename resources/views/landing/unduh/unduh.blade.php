<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman yang Diunduh</title>
</head>

<body>
    <h2>Nomor orderan : {{ $order->nomor_orderan }}</h2>
@foreach ($order->items as $item)
 <h4>Produk : {{ $item->produk->nama }} x{{ $item->kuantiti }}</h4>
 @endforeach
 <h4>Harga Total : {{ 'Rp ' . number_format($order->total_amount, 2, ',', '.') }}</h4><br>
<p>Tanggal dan hari pesanan : {{ $order->created_at->translatedFormat('l, d F Y') }}</p>
<p>Jam pesanan : {{ $order->created_at->format('H:i:s') }} WIB</p>
<p>Hari terakhir bayar : {{ $order->created_at->addHours(24)->translatedFormat('l, d F Y') }}</p>
<p style="color: red;"><b>Jam terakhir bayar : {{ $order->created_at->addHours(24)->format('H:i:s') }} WIB</b></p>

<br>
<P>Pembayaran dapat melalui salah satu bank:</P>
<ul>
    <li>BRI: 028131031</li>
    <li>BNI: 028131031</li>
    <li>Mega: 028131031</li>
    <li>BSI: 028131031</li>
</ul>
<h1 style="color: red; font-size:16px;">Bayar pesanan anda sebelum 24 jam, lewat dari 24 jam pesanan anda akan dibatalkan secara otomatis oleh sistem</h1>
</body>

</html>
