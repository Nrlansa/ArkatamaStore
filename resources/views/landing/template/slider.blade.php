<!-- Hero Slider Start-->
    <div class="hero-slider section fix">
    @foreach ($list_slider as $slider)
        @if ($slider->is_active === 'aktif')
        <div class="hero-item" style="background-image: url('{{ url('public/' . $slider->banner) }}');">
            <div class="hero-content text-center m-auto">
                <h2 style="color:black">{{ $slider->promo }}</h2>
                <h1 style="color:black">{{ $slider->nama }}</h1>
                <p style="color:black">{{ $slider->title }}</p>
                @if (Auth::check())
                    <a href="{{ url('/listproduk') }}" style="color:black">Belanja sekarang</a>
                @else
                    <a href="{{ url('/login') }}" style="color:black">Belanja sekarang</a>
                @endif
            </div>
        </div>
        @endif
    @endforeach
    </div>
    