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
            <a href="" class="float-end close" data-dismiss="alert" aria-label="close"
                style="text-decoration: none;">&times;</a>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-6">
                        <h4>Data Pesanan yang perlu dikirim</h4>
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
                        <th>Status Pengiriman</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pembayaran as $pembayaran)
                        @if ($pembayaran->pesanan->status == 'Terverifikasi')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/info', $pembayaran->id) }}" class="btn btn-primary"><i
                                                class="fas fa-info"></i></a>
                                    </div>
                                </td>
                                <td>{{ $pembayaran->member->nama }}</td>
                                <td>{{ $pembayaran->nomor_orderan }}</td>
                                <td>{{ 'Rp ' . number_format($pembayaran->total_pembayaran, 2, ',', '.') }}</td>
                                <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                                <td>{{ $pembayaran->pesanan->status }}</td>
                                <td>
                                    @if ($pembayaran->pengiriman)
                                        @if ($pembayaran->pengiriman->status_pengiriman == 'Telah dikirim')
                                            <p style="color: green"><b>Sudah Dikirim</b></p>
                                        @endif
                                    @else
                                            <p style="color: red"><b>Belum Dikirim</b></p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset('public/bukti/' . $pembayaran->bukti_bayar) }}" target="_blank">Lihat
                                        Bukti disini..</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
