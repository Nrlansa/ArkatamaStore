<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $data['list_slider'] = Slider::all();
        $data['list_kategori'] = Kategori::all();
        $data['list_produk'] = Produk::all();
        return view('landing.home',$data);
    }
    
    public function show($id){
        $data['produk'] = Produk::findOrFail($id);
        $data['kategori'] = Kategori::all();
        return view('landing.showproduk', $data);
    }

}
