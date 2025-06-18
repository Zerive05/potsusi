<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar | {{ $hotel->name ?? 'Hotel' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style2.css')
</head>

<body>
    @include('layouts.navbar')

    <div class="container-span-hotele">
        <p class="kamar-header">{{ $hotel->nama }}</p>
        <p class="welcome-message">
            'Selamat datang di hotel kami!'<br>
            'Fasilitas'<br>
            @php
            $fasilitasArray = json_decode($hotel->fasilitas);
            @endphp
            @if(is_array($fasilitasArray))
            {{ implode(', ', array_slice($fasilitasArray, 0, 100)) }}
            @else
            -
            @endif<br>
            'Tentang'<br>
            {{ $hotel->tentang }}
        </p>
    </div>

    <div class="main-container">
        <h1>Kamar yang Tersedia</h1>
        <div class="hotel-list-grid">
            @foreach ($kamar as $kamar)
            <div class="hotel-card">
                <div class="hotel-card-body">
                    <h2 class="hotel-name">{{ $kamar->nama_kamar }}</h2>
                    <p class="hotel-location">Tipe: {{ $kamar->tipe_kamar }}</p>
                    <p class="hotel-location">Kapasitas: {{ $kamar->kapasitas }}</p>
                    <p class="hotel-rating">Harga: Rp{{ number_format($kamar->harga, 0, ',', '.') }} <i class="fas fa-dollar-sign" style="color: green;"></i></p>

                    <p class="hotel-fasilitas">Fasilitas:
                        @php
                        $fasilitasArray = json_decode($kamar->fasilitas);
                        @endphp
                        @if(is_array($fasilitasArray))
                        {{ implode(', ', array_slice($fasilitasArray, 0, 100)) }}
                        @else
                        -
                        @endif
                    </p>
                    <p class="hotel-tentang">{{ Str::limit($kamar->deskripsi, 80) }}</p>
                    <p class="status-kamar" @if($kamar->status == 'tersedia') style="color: green;" @else style="color: red;" @endif>{{ $kamar->status == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                    @if($kamar->status == 'tersedia')
                    <a href="{{ route('kamar.pesan', $kamar->id) }}" class="btn-pesan">Pesan</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @vite('resources/js/script2.js')
</body>

</html>