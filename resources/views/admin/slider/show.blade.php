@extends('welcome')

@section('content')
<a href="{{ url('/slider') }}" class="btn btn-primary mb-2">
    <i class="fas fa-arrow-left mx-2"></i>Kembali
</a>

<div class="card">
    <div class="card-header">
        <h2>{{ $slider->nama }}</h2>
    </div>
    <div class="card-body">
        <div style="display: flex; align-items: center;">
            <div style="flex: 1;">
                <!-- Form update status -->
                @if ($slider->is_active === 'aktif')
                   <form action="{{ route('slider.update-status', [$slider->id, 'tidak']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah banner menjadi tidak aktif?')">
                            Tidak aktif
                        </button>
                    </form>
                @elseif ($slider->is_active === 'tidak')
                  <form action="{{ route('slider.update-status', [$slider->id, 'aktif']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah banner menjadi aktif?')">
                           Aktif
                        </button>
                    </form>
                @else
                    <form action="{{ route('slider.update-status', [$slider->id, 'aktif']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah banner menjadi aktif?')">
                           Aktif
                        </button>
                    </form>

                    <form action="{{ route('slider.update-status', [$slider->id, 'tidak']) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin mengubah banner menjadi tidak aktif?')">
                            Tidak aktif
                        </button>
                    </form>
                @endif
            </div>
            <div style="flex: 1;">
                <img src="{{ url('public/' . $slider->banner) }}" alt="Gambar slider" style="max-width: 80%;">
            </div>
        </div>
    </div>
</div>

@endsection
