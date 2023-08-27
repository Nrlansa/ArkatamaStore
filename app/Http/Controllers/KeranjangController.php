<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KeranjangController extends Controller
{
    public function tambahKeKeranjang(Request $request)
    {
        $produkId = $request->input('id_produk');
        $userid = $request->input('id_user');
        $jumlah = $request->input('jumlah');
        // Lakukan validasi dan validasi lainnya sesuai kebutuhan

        // Tambahkan produk ke keranjang
        $keranjang = new Keranjang();
        $keranjang->id_user = $userid;
        $keranjang->id_produk = $produkId;
        $keranjang->jumlah = $jumlah;
        $keranjang->save();

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }
    public function index()
    {
        $data['list_kategori'] = Kategori::all();

        // Ambil data keranjang dari database
        $keranjang = Keranjang::all();
        $keranjang = Keranjang::groupBy('id_produk')
        ->selectRaw('id_produk, SUM(jumlah) as total_jumlah')
        ->get();

        $keranjang->each(function ($item) {
            $item->total_price = $item->total_jumlah * $item->produk->price;
        });
        
        $subtotal = $keranjang->sum(function ($item) {
            return $item->total_price;
        });
        // Tambahkan variabel $keranjang ke dalam array $data
        $data['keranjang'] = $keranjang;
        $data['subtotal'] = $subtotal;
       //@dd($keranjang);

        // Tampilkan view keranjang dengan data yang diperlukan
        return view('landing.keranjang.index', $data);

    }
    
    public function hapusDariKeranjang($id)
    {
        Keranjang::where('id_produk', $id)->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }


    




    
}
