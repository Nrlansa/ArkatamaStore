@extends('welcome')

@section('content')

<a href="{{ url('/kirim') }}" class="btn btn-primary mb-2">
    <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>
@if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
            <a href="" class="float-end close" data-dismiss="alert" aria-lable="close"
                style="text-decoration: none;">&times;</a>
        </div>
    @endif
<div class="card">
    <div class="card-header">
        <h2>Detail</h2>
    </div>
    <div class="card-body">
        <div style="display: flex;">
            <div style="flex: 1;">
                <p>Nama pembeli: {{ $pembayaran->member->nama }}</p>
                <p>Nomor orderan : {{ $pembayaran->nomor_orderan }}</p>
                <p>Total Bayar : {{ 'Rp ' . number_format($pembayaran->total_pembayaran , 2, ',', '.') }}</p>
                <p>Status pembayaran: {{ $pembayaran->pesanan->status }} </p>
            </div>
            <div style="flex: 1;">
                @if ($pembayaran->pengiriman && $pembayaran->pengiriman->status_pengiriman === 'Telah dikirim')
                    <p>Status Pengiriman: Telah dikirim</p>
                    <p>Nomor Resi: {{ $pembayaran->pengiriman->nomor_resi }}</p>
                    <p>Tanggal pengiriman: {{ \Carbon\Carbon::parse($pembayaran->pengiriman->tanggal_pengiriman)->locale('id')->isoFormat('dddd, D MMMM Y HH:mm:ss') }}</p>
                @else
                    <form action="{{ route('proseskirim', $pembayaran->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="nomor_orderan" value="{{ $pembayaran->nomor_orderan }}">
                            <input type="hidden"  name="status_pengiriman" value="Telah dikirim">
                        </div>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin pesanan ini akan dikirim')">Kirim Pesanan ini</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
