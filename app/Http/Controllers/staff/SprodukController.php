<?php

namespace App\Http\Controllers\staff;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SprodukController extends Controller
{
    public function index(User $user, Kategori $kategori)
    {
        $data['user'] = $user;
        $data['list_kategori'] = Kategori::all();
        $data['list_produk'] = Produk::all();
        return view('staff.produk.index', $data);
    }

    public function create()
    {
        $data['list_kategori'] = Kategori::all();
        return view('staff.produk.create', $data);
    }
    
    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama Produk harus diisi.',
            'id_kategori.required' => 'Kategori Wajib diisi.',
            'deskripsi.required' => 'Deskripsi Produk harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'berat.required' => 'Berat harus diisi.',
            'berat.numeric' => 'Berat harus berupa angka.',
            'gambar.required' => 'Gambar Produk harus diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ];

        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'price' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg|max:2048',
        ], $messages);

        $gambar = $request->file('gambar');
        $destinationPath = public_path('gambar');

        $namaGambar = 'gambar_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $namaGambar);

        $produk = new Produk;
        $produk->nama = $request->input('nama');
        $produk->berat = $request->input('berat');
        $produk->id_kategori = $request->input('id_kategori');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->price = $request->input('price');
        $produk->created_by = $request->input('created_by');
        $produk->status = $request->input('status');
        $produk->stok = $request->input('stok');
        $produk->gambar = 'gambar/' . $namaGambar;
        // @dd($produk)
        $produk->save();

        return redirect('/staffproduk')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'price' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'nullable|max:2048',
        ], [
            'nama.required' => 'Nama Produk harus diisi.',
            'id_kategori.required' => 'Kategori Wajib diisi.',
            'deskripsi.required' => 'Deskripsi Produk harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'berat.required' => 'Berat harus diisi.',
            'berat.numeric' => 'Berat harus berupa angka.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama = $request->input('nama');
        $produk->berat = $request->input('berat');
        $produk->id_kategori = $request->input('id_kategori');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->price = $request->input('price');
        $produk->created_by = $request->input('created_by');
        $produk->status = $request->input('status');

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                $gambarPath = public_path($produk->gambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
            $gambar = $request->file('gambar');
            $destinationPath = public_path('gambar');
            $namaGambar = 'gambar_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $produk->gambar = 'gambar/' . $namaGambar;
        }
        $produk->save();

        return redirect('/staffproduk')->with('success', 'Data berhasil diperbarui');
    }

    public function edit(Produk $produk)
    {
        $data['produk'] = $produk;
        $data['list_kategori'] = Kategori::all();
        return view('staff.produk.edit', $data);
    }

    public function show($id)
    {
        $data['produk'] = Produk::findOrFail($id);
        $data['kategori'] = Kategori::all();

        return view('staff.produk.show', $data);
    }

    
    public function destroy(Produk $produk, $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar) {
            $gambarPath = public_path($produk->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }
        $produk->delete();

        return redirect('/staffproduk')->with('success', 'Data berhasil dihapus');
    }
}
