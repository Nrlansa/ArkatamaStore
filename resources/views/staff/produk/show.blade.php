@extends('staff.staff')

@section('content')
<a href="{{ url('/staffproduk') }}" class="btn btn-primary mb-2">
    <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>

<div class="card">
    <div class="card-header">
        <h2>{{ $produk->nama }}</h2>
    </div>
    <div class="card-body">
        <div style="display: flex;">
            <div style="flex: 1;">
                <p>Kategori: {{ $produk->kategori->nama }}</p>
                <p>Deskripsi: {{ $produk->deskripsi }}</p>
                <p>Harga: {{ $produk->formatted_price }}</p>
                <p>Status: {{ $produk->status }}</p>
                <p>Dibuat oleh: {{ $produk->createdBy->nama }}</p>
               @if ($produk->status === 'disetujui')
                    <p style="color: rgb(9, 228, 9);"><b>Produk Telah disetujui oleh: {{ $produk->verifiedBy->nama }}</b></p>
                @elseif ($produk->status === 'ditolak')
                    <p style="color: red;"><b>Periksa Kembali Produk, pengajuan ditolak oleh: {{ $produk->verifiedBy->nama }}</b></p>
                @else
                    <p style="color: rgb(60, 159, 240)"><b>Produk Anda belum diverifikasi oleh admin, mohon tunggu...</b></p>
                @endif

            </div>
            <div style="flex: 1;">
                <img src="{{ url('public/' . $produk->gambar) }}" alt="Gambar Produk" style="max-width: 80%;">
            </div>
        </div>
    </div>
</div>

@endsection
