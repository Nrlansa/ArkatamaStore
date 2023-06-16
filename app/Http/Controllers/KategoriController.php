<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data['list_kategori'] = Kategori::all();
        return view('admin.produk.kategori.index', $data);
    }

    public function store()
    {
        $kategori = new Kategori;
        $kategori->nama = request('nama');

        $kategori->save();

        return redirect('/produk/kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Kategori $kategori)
    {
        $kategori->nama = request('nama');

        $kategori->save();

        return redirect('/produk/kategori')->with('success', 'Data berhasil diedit');
    }
}
