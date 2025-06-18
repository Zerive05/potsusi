<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan kamar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style2.css') {{-- Pastikan ini mengarah ke file CSS yang diperbarui --}}
</head>

<body>
    @include('layouts.navbar')

    <div class="main-container">
        <h1>Hotel yang Tersedia</h1>

        <div class="hotel-list-grid">
            @foreach ($hotel as $hotel)
            <div class="hotel-card">
                <div class="hotel-image">
                    <img src="{{ asset($hotel->gambar) }}" alt="Gambar hotel {{ $hotel->nama }}">
                </div>
                <div class="hotel-card-body">
                    <h2 class="hotel-name">{{ $hotel->nama }}</h2>
                    <p class="hotel-location">Lokasi: {{ $kota->nama ?? 'Tidak Diketahui' }}</p>
                    <p class="hotel-rating">Rating: {{ $hotel->rating }} <i class="fas fa-star" style="color: gold;"></i></p>

                    <p class="hotel-fasilitas">Fasilitas:
                        @php
                        $fasilitasArray = json_decode($hotel->fasilitas);
                        @endphp
                        @if(is_array($fasilitasArray))
                        {{ implode(', ', array_slice($fasilitasArray, 0, 3)) }}...
                        @else
                        -
                        @endif
                    </p>
                    <p class="hotel-tentang">{{ Str::limit($hotel->tentang, 80) }}</p>
                    <a href="{{ route('hotel.show', $hotel->id) }}" class="btn-detail">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @vite('resources/js/script2.js')
</body>

</html>