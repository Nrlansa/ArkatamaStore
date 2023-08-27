<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(){
        $data['list_slider'] = Slider::all();
        return view('admin.slider.index', $data);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'is_active' => 'required',
        ], [
            'nama.required' => 'Nama slider harus diisi.',
            'is_active.required' => 'Status banner harus dipilih.',
        ]);

        $gambar = $request->file('banner');
        $destinationPath = public_path('slider');

        $namaGambar = 'slider_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $namaGambar);

        $slider = new Slider;
        $slider->nama = $request->input('nama');
        $slider->promo = $request->input('promo');
        $slider->title = $request->input('title');
        $slider->is_active = $request->input('is_active');
        $slider->banner = 'slider/' . $namaGambar;

        $slider->save();

        return redirect('/slider')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data['slider'] = Slider::findOrFail($id);

        return view('admin.slider.show', $data);
    }
    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'is_active' => 'required',
        ]);

        $slider->nama = $request->input('nama');
        $slider->is_active = $request->input('is_active');
        $slider->promo = $request->input('promo');
        $slider->title = $request->input('title');
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $destinationPath = public_path('slider');

            $namaGambar = 'slider_' . uniqid() . '.' . $banner->getClientOriginalExtension();
            $banner->move($destinationPath, $namaGambar);

            
            if ($slider->banner) {
                $gambarPath = public_path($slider->banner);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            $slider->banner = 'slider/' . $namaGambar;
        }
        $slider->save();

        return redirect('/slider')->with('success', 'Data berhasil diedit');
    }

    public function updateStatus($id, $is_active)
    {
        $slider = Slider::findOrFail($id);

        $slider->is_active = $is_active;
        $slider->save();

        return redirect()->back()->with('success', 'Status Bannar berhasil diubah.');
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->banner);
        $slider->delete();
        return redirect('/slider')->with('success', 'Data berhasil dihapus');
    }
   
}
