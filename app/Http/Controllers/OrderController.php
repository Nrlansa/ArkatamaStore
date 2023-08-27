<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Member;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function checkout(Request $request)
    {
        // Mendapatkan ID pengguna yang terautentikasi
        $user_id = auth()->user()->id;

        // Generate nomor pesanan unik
        $orderNumber = Carbon::now()->format('YmdHis') . mt_rand(1000, 9999);
        $orderNumber .= Str::random(3);

        // Membuat entitas pesanan baru di database
        $order = Order::create([
            'id_user' => $user_id,
            'nomor_orderan' => $orderNumber,
            'total_amount' => 0,
            'total_berat' => 0,
            'status' => 'Baru',
        ]);

        // Mengambil item dari keranjang untuk pemesanan
        $items = Keranjang::where('id_user', $user_id)->get();

        $totalAmount = 0;
        $totalBerat = 0;

        // Menghitung total jumlah dan berat, serta menciptakan entitas OrderItem
        foreach ($items as $item) {
            $itemTotal = $item->jumlah * $item->produk->price;
            $totalAmount += $itemTotal;

            $itemBerat = $item->jumlah * $item->produk->berat;
            $totalBerat += $itemBerat;

            OrderItem::create([
                'id_pesanan' => $order->id,
                'id_produk' => $item->id_produk,
                'kuantiti' => $item->jumlah,
                'harga' => $item->produk->price,
                'total' => $itemTotal,
                'berat' => $itemBerat,
            ]);

            // Mengurangi stok barang
            $product = $item->produk;
            $newStock = $product->stok - $item->jumlah;

            if ($newStock >= 0) {
                $product->stok = $newStock;
                $product->save();
            }
        }

        // Mengupdate total_amount dan total_berat pada entitas pesanan
        $order->total_amount = $totalAmount;
        $order->total_berat = $totalBerat;
        $order->save();

        // Mengubah status pesanan menjadi "Dalam Proses Pembayaran"
        $order->status = 'Dalam Proses Pembayaran';
        $order->save();


        // Menghapus semua item keranjang yang telah di-checkout
        Keranjang::where('id_user', $user_id)->delete();

        // Mengarahkan pengguna ke halaman detail pesanan dengan pesan sukses
        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil diproses.');
    }
   


    public function show($id)
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::findOrFail($id);
        return view('landing.order.show', $data);
    }
    public function unduh($id)
    {
        $data['list_kategori'] = Kategori::all();
        $data['order'] = Order::findOrFail($id);
        return view('landing.order.show', $data);
    }
}
