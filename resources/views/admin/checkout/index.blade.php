@extends('welcome')
@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
            <a href="" class="float-end close" data-dismiss="alert" aria-lable="close"
                style="text-decoration: none;">&times;</a>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-6">
                        <h4>Data Pesanan yang masuk</h4>
                    </div>
                    <div class="col-4 col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama Pembeli</th>
                        <th>Nomor Pesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pembayaran as $pembayaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                        <div class="d-flex">
                                           @if ($pembayaran->pesanan->status == 'menunggu verifikasi')
                                                <form action="{{ route('update.status', $pembayaran->id) }}" method="POST" class="me-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Terverifikasi">
                                                    <button type="submit" class="btn btn-success btn-sm">Terverifikasi</button>
                                                </form>
                                                <form action="{{ route('update.status', $pembayaran->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="tidak valid">
                                                    <button type="submit" class="btn btn-danger btn-sm">Bukti Tidak Valid</button>
                                                </form>
                                            @elseif ($pembayaran->pesanan->status === 'tidak valid')
                                                <p class="m-0">Pembeli sedang memperbaiki bukti bayar</p>
                                            @elseif ($pembayaran->pengiriman->status_pengiriman === 'Telah dikirim')
                                                <p class="m-0">Pesanan sudah dikirim</p>
                                            @else
                                                <p class="m-0">Barang menunggu dikemas</p>
                                            @endif
                                        </div>
                                </td>
                                <td>{{ $pembayaran->member->nama }}</td>
                                <td>{{ $pembayaran->nomor_orderan }}</td>
                                <td>{{ 'Rp ' . number_format($pembayaran->total_pembayaran , 2, ',', '.') }}</td>
                                <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                                <td>{{ $pembayaran->pesanan->status }}</td>
                                <td>
                                    <a href="{{ asset('public/bukti/' . $pembayaran->bukti_bayar) }}" target="_blank">Lihat Bukti disini..</a>
                                </td>  
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
