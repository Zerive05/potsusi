<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ $user->name ?? 'Pengguna' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style2.css')
</head>

<body>
    @include('layouts.navbar')

    <div class="dashboard-container">
        <h1 class="dashboard-header">Selamat Datang di Dashboard Anda!</h1>
        <p class="welcome-message">
            Halo, **{{ $user->name ?? 'Pengguna' }}**!
            <br>Ini adalah halaman dashboard pribadi Anda.
            Di sini Anda dapat mengelola akun Anda dan melihat informasi relevan lainnya.
        </p>
    </div>

    <div class="location-cards-container">
        <div class="location-cards-wrapper">
            @foreach ($kota as $kota)
            <a href="{{ route('kota.show', ['id' => $kota->id]) }}" class="location-card-link">
                <div class="location-card">
                    <div class="card-image">
                        <img src="{{ asset('images/' . $kota->nama . '1.jpeg') }}" alt="ikon kota {{ $kota->nama }}">
                    </div>
                    <div class="card-content">
                        <h3 class="location-name">{{ $kota->nama }}</h3>
                        <p class="hotel-count">2.378 Hotel</p>
                        <p class="average-price">Rp 581.572 <span class="rate-text">Rata-rata</span></p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @vite('resources/js/script2.js')
</body>

</html>