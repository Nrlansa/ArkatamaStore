@extends('welcome')

@section('content')
<a href="{{ url('/produk') }}" class="btn btn-primary mb-2">
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
                <!-- Form update status -->
                @if ($produk->status === 'disetujui')
                    <p style="color: rgb(9, 228, 9);"><b>Produk Telah disetujui oleh: {{ $produk->verifiedBy->nama }}</b></p>
                @elseif ($produk->status === 'ditolak')
                    <p style="color: red;"><b>Periksa Kembali Produk, pengajuan ditolak oleh: {{ $produk->verifiedBy->nama }} </b></p>
                @else
                    <form action="{{ route('produk.update-status', [$produk->id, 'disetujui']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi disetujui?')">
                            Setujui
                        </button>
                    </form>

                    <form action="{{ route('produk.update-status', [$produk->id, 'ditolak']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi ditolak?')">
                            Tolak
                        </button>
                    </form>
                @endif
            </div>
            <div style="flex: 1;">
                <img src="{{ url('public/' . $produk->gambar) }}" alt="Gambar Produk" style="max-width: 80%;">
            </div>
        </div>
    </div>
</div>

@endsection
