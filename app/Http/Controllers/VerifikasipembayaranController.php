<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Member;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VerifikasipembayaranController extends Controller
{
    public function index(){
      
        $data['list_pembayaran'] = Pembayaran::all();
        return view('admin.checkout.index', $data);
    }
    public function updateStatus(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->pesanan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');

    }
    public function kirim()
    {
        $data['list_pembayaran'] = Pembayaran::all();
        return view('admin.checkout.kirim', $data);
    }
    public function proseskirim(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'status_pengiriman' => 'required',
        ]);

        if (!$pembayaran->pengiriman) {
            $kodeUnik = mt_rand(1000, 9999);
            $tanggal = date('Ymd');
            $nomorResi = "ARS" . $tanggal . $kodeUnik;

            // Tambahkan karakter acak tambahan
            $randomChars = strtoupper(Str::random(4)); // Misalnya 4 karakter acak huruf besar
            $nomorResi .= $randomChars;
        } else {
            $nomorResi = $pembayaran->pengiriman->nomor_resi;
        }
        $pengiriman = new Pengiriman([
            'nomor_resi' => $nomorResi,
            'status_pengiriman' => $request->status_pengiriman,
            'tanggal_pengiriman' => Carbon::now(),
            'nomor_orderan'=> $request->nomor_orderan,
        ]);

        $pembayaran->pengiriman()->save($pengiriman);

        return redirect()->back()->with('success', 'Informasi pengiriman berhasil ditambahkan.');
    }


    public function info($id)
    {
        $data['pembayaran'] = Pembayaran::findOrFail($id);
      

        return view('admin.checkout.aksipengiriman', $data);
    }

}
