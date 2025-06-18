<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar | {{ $kamar->nama_kamar ?? 'Kamar' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style2.css')
</head>

<body>
    @include('layouts.navbar')

    {{-- Pastikan Anda sudah menambahkan bagian ini di bagian atas file untuk menampilkan pesan --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="kamar-detail-section container-span-hotele">
        <h2 class="kamar-header">Detail Kamar: {{ $kamar->nama_kamar }}</h2>
        <p><strong>Tipe:</strong> {{ $kamar->tipe_kamar }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($kamar->harga, 0, ',', '.') }} per malam</p>
        <p><strong>Kapasitas:</strong> {{ $kamar->kapasitas }} orang</p>
        <p><strong>Status:</strong> <span style="font-weight: bold; color: {{ $kamar->status == 'tersedia' ? 'green' : 'red' }};">{{ strtoupper($kamar->status) }}</span></p>
        <p><strong>Deskripsi:</strong> {{ $kamar->deskripsi }}</p>
        <p><strong>Fasilitas:</strong>
            @php
            $fasilitas = json_decode($kamar->fasilitas);
            @endphp
            @if (is_array($fasilitas) && count($fasilitas) > 0)
        <ul>
            @foreach ($fasilitas as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
        @else
        - Tidak ada fasilitas tercatat -
        @endif
        </p>

        {{-- Garis Pemisah (opsional, jika ingin sedikit pemisah visual) --}}
        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        {{-- Form Pemesanan Kamar (sekarang di dalam kamar-detail-section yang sama) --}}
        <h2>Form Pemesanan Kamar</h2>
        @if ($kamar->status == 'tersedia')
        <form action="{{ route('kamar.pesan', $kamar->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="check_in">Tanggal Check-in:</label>
                <input type="date" name="check_in" id="check_in" class="form-control"
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                    value="{{ old('check_in') }}"
                    required>
                @error('check_in')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="check_out">Tanggal Check-out:</label>
                <input type="date" name="check_out" id="check_out" class="form-control"
                    min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}"
                    value="{{ old('check_out') }}"
                    required>
                @error('check_out')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_tamu">Jumlah Tamu:</label>
                <input type="number" name="jumlah_tamu" id="jumlah_tamu" class="form-control"
                    min="1"
                    max="{{ $kamar->kapasitas }}"
                    value="{{ old('jumlah_tamu', 1) }}"
                    required>
                @error('jumlah_tamu')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Konfirmasi Pemesanan
            </button>
        </form>
        @else
        <p class="text-center" style="color: red; font-weight: bold; font-size: 1.1em;">Maaf, kamar ini tidak tersedia untuk dipesan saat ini.</p>
        <div class="text-center">
            <button class="btn btn-secondary" disabled>
                Kamar Tidak Tersedia
            </button>
        </div>
        @endif
    </div>

</body>

</html>