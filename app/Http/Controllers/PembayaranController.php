<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Order;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PembayaranController extends Controller
{

    // public function index()
    // {
    //     $data['list_kategori'] = Kategori::all();
    //     $data['order'] = Order::with('produk')->get();
    //     $data['keranjang'] = Keranjang::all();
        
    //     foreach ($data['order'] as $pesanan) {
    //         $this->checkAndCancelOrder($pesanan->id);
    //     }
    //     return view('landing.order.daftarpembayaran', $data);
    // }
    public function belumbayar()
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::with('produk')->get();
        $data['keranjang'] = Keranjang::all();

        foreach ($data['order'] as $pesanan) {
            $this->checkAndCancelOrder($pesanan->id);
        }
        return view('landing.order.belumbayar', $data);
    }
    public function dikemas()
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::with('produk')->get();
        $data['keranjang'] = Keranjang::all();

        foreach ($data['order'] as $pesanan) {
            $this->checkAndCancelOrder($pesanan->id);
        }
        return view('landing.order.dikemas', $data);
    }

    public function dikirim()
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::with('produk')->get();
        $data['keranjang'] = Keranjang::all();
        $data['pembayaran'] = Pembayaran::all();
        $data['pengiriman']= Pengiriman::all();

        return view('landing.order.dikirim', $data);
    }

    public function pembatalan()
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::with('produk')->get();
        $data['keranjang'] = Keranjang::all();

        foreach ($data['order'] as $pesanan) {
            $this->checkAndCancelOrder($pesanan->id);
        }
        return view('landing.order.pembatalan', $data);
    }

    public function checkAndCancelOrder($orderId)
    {

        $pesanan = Order::findOrFail($orderId);
        
        $waktuBatasPembatalan = $pesanan->created_at->addHours(24);

        if (now() > $waktuBatasPembatalan) {
           
            if ($pesanan->status === 'Dalam Proses Pembayaran') {
               
                foreach ($pesanan->items as $item) {
                    $product = $item->produk;
                    $newStock = $product->stok + $item->kuantiti;
                    $product->update(['stok' => $newStock]);
                }

                $pesanan->update(['status' => 'Pesanan Dibatalkan']);
            }
        }
    }

    public function pemeriksaan()
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::with('produk')->get();
        $data['keranjang'] = Keranjang::all();

        foreach ($data['order'] as $pesanan) {
            $this->checkAndCancelOrder($pesanan->id);
        }
        return view('landing.order.pemeriksaan', $data);
    }
    public function uploadBuktiBayar(Request $request, $orderId)
    {
        
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

       
        $pesanan = Order::findOrFail($orderId);
        
        if ($request->hasFile('bukti_bayar')) {
            
            $file = $request->file('bukti_bayar');
            $destinationPath = public_path('bukti');

            $namaGambar = 'gambar_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $namaGambar);

            $pembayaran = Pembayaran::updateOrCreate(
                ['id_pesanan' => $orderId],
                [
                    'nomor_orderan'=> $pesanan->nomor_orderan,
                    'id_user' => auth()->user()->id,
                    'total_pembayaran' => $pesanan->total_amount,
                    'tanggal_pembayaran' => now(),
                    'bukti_bayar' => $namaGambar,
                ]
            );

            $pesanan->update(['status' => 'menunggu verifikasi']);

            return redirect()->route('belumbayar.belumbayar')->with('success', 'Bukti bayar berhasil diunggah.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah bukti bayar.');
    }

    public function downloadPDF($id)
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::findOrFail($id);
        $data['keranjang'] = Keranjang::all();
        Carbon::setLocale('id');

        // Konten HTML dari tampilan yang ingin diubah menjadi PDF
        $content = view('landing.unduh.unduh', $data)->render();

        $options = new Options();
        $options->set('defaultFont', 'Arial'); // Atur font default

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($content);

        // Render konten menjadi PDF
        $dompdf->render();

        // Unduh file PDF
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="bukti_pesan.pdf"',
        ]);
    }
    
    public function uploadBuktipengiriman(Request $request, $orderId)
    {

        $request->validate([
            'bukti_pengiriman' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $pesanan = Order::findOrFail($orderId);

        if ($request->hasFile('bukti_pengiriman')) {

            $file = $request->file('bukti_pengiriman');
            $destinationPath = public_path('bukti_pengiriman');

            $namaGambar = 'gambar_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $namaGambar);

            $pembayaran = Pembayaran::updateOrCreate(
                ['id_pesanan' => $orderId],
                [
                    'nomor_orderan' => $pesanan->nomor_orderan,
                    'id_user' => auth()->user()->id,
                    'total_pembayaran' => $pesanan->total_amount,
                    'tanggal_pembayaran' => now(),
                    'bukti_bayar' => $namaGambar,
                ]
            );

            $pesanan->update(['status' => 'menunggu verifikasi']);

            return redirect()->route('belumbayar.belumbayar')->with('success', 'Bukti bayar berhasil diunggah.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah bukti bayar.');
    }


}
