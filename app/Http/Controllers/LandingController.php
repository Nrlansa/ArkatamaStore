<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Member;
use App\Models\Produk;
use App\Models\Slider;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $data['list_slider'] = Slider::all();
        $data['list_kategori'] = Kategori::all();
        $data['list_produk'] = Produk::all();
        
        return view('landing.produk.produk',$data);
    }
    
    public function show($id){
        $data['produk'] = Produk::findOrFail($id);
        $data['kategori'] = Kategori::all();
        return view('landing.showproduk', $data);
    }
    public function listproduk()
    {
        $data['order']= Order::all();
        $data['member'] = Member::all();
        $data['list_slider'] = Slider::all();
        $data['list_kategori'] = Kategori::all();
        $data['list_produk'] = Produk::all();
        return view('landing.produk.allproduk', $data);
    }
    public function profil($id)
    {
        $data['member'] = Member::findOrFail($id);
        return view('landing.profil', $data);
    }
    public function detail($id)
    {
        $data['produk'] = Produk::findOrFail($id);
        $data['list_kategori'] = Kategori::all();
        return view('landing.produk.tentangproduk', $data);
    }
}
