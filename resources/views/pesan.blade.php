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

    <div class="kontener-pesan">
        <div class="pesan-card">
            <div class="pesan-awak-card">
                <h2 class="hotel-name">{{ $kota->nama }}</h2>
                <h2 class="hotel-name" style="font-size: 20px;">{{ $hotel->nama }}</h2>
                <h2 class="hotel-name" style="font-size: 15px;">{{ $kamar->nama_kamar }}</h2>
                <div class="detil1">
                    <div class="detil2">
                        <a><b>Tipe</b></a>
                        <a><b>:</b></a>
                    </div>
                    <a>{{ $kamar->tipe_kamar }}</a><br>
                </div>
                <div class="detil1">
                    <div class="detil2">
                        <a><b>Kapasitas</b></a>
                        <a><b>:</b></a>
                    </div>
                    <a>{{ $kamar->kapasitas }}</a><br>
                </div>
                <div class="detil1">
                    <div class="detil2">
                        <a><b>Fasilitas</b></a>
                        <a><b>:</b></a>
                    </div>
                    <a>
                        @php
                        $fasilitasArray = json_decode($kamar->fasilitas);
                        @endphp
                        @if(is_array($fasilitasArray))
                        {{ implode(', ', array_slice($fasilitasArray, 0, 100)) }}
                        @else
                        -
                        @endif
                    </a><br>
                </div>
                <div class="detil1">
                    <div class="detil2">
                        <a><b>Deskripsi</b></a>
                        <a><b>:</b></a>
                    </div>
                    <a>{{ $kamar->deskripsi }}</a><br>
                </div>
                <div class="detil1">
                    <div class="detil2">
                        <a><b>Harga</b></a>
                        <a><b>:</b></a>
                    </div>
                    <a id="hargapermalam">Rp{{ number_format($kamar->harga, 0, ',', '.') }} /hari</a><br>
                </div>
            </div>
            <div class="form-pesan">
                <div class="booking-form">
                    <h2>Pesan Kamar Ini</h2>
                    <form action="{{ route('pesan.store', $kamar->id) }}" method="POST">
                        @csrf

                        {{-- 1. Tanggal Check-in dan Check-out Bersebelahan --}}
                        <div class="date-group">
                            <div class="form-group">
                                <label for="check_in_date">Tanggal Check-in:</label>
                                <input type="date" id="check_in_date" name="check_in_date" required value="{{ old('check_in_date') }}">
                                @error('check_in_date')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="check_out_date">Tanggal Check-out:</label>
                                <input type="date" id="check_out_date" name="check_out_date" required value="{{ old('check_out_date') }}">
                                @error('check_out_date')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- 2. Dropdown Pemilihan Metode Pembayaran --}}
                        <div class="form-group">
                            <label for="payment_method">Metode Pembayaran:</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="credit_card" {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>Kartu Kredit</option>
                                <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Transfer Bank</option>
                                <option value="e-wallet" {{ old('payment_method') == 'e-wallet' ? 'selected' : '' }}>E-Wallet</option>
                                {{-- Anda bisa menambahkan opsi lain di sini --}}
                            </select>
                            @error('payment_method')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 3. Total Harga Akumulasi --}}
                        <div class="total-price-display">
                            Total Harga: <span id="totalPrice">Rp 0</span>
                        </div>

                        {{-- 4. Tombol Submit --}}
                        <button type="submit" class="btn-primary">Konfirmasi Pemesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // / --- Logika untuk Tanggal Check-in/Check - out dan Kalkulasi Harga-- -
            const checkInDateInput = document.getElementById('check_in_date');
            const checkOutDateInput = document.getElementById('check_out_date');
            const totalPriceSpan = document.getElementById('totalPrice');

            // Ambil harga kamar dari Blade. Gunakan pengecekan untuk memastikan nilai numerik.
            // Gunakan JSON.parse() untuk mengamankan nilai dan parseFloat() untuk mengonversi ke angka.
            const rawRoomPrice = "{{ $kamar->harga }}"; // Ambil sebagai string
            let roomPricePerNight;

            try {
                // Coba parse sebagai float. Jika gagal, default ke 0.
                roomPricePerNight = parseFloat(rawRoomPrice);
                if (isNaN(roomPricePerNight)) {
                    roomPricePerNight = 0;
                    console.warn("Harga kamar tidak valid, diatur ke 0. Harga asli: ", rawRoomPrice);
                }
            } catch (e) {
                roomPricePerNight = 0;
                console.error("Kesalahan saat mengurai harga kamar, diatur ke 0.", e);
            }

            // Fungsi untuk mendapatkan tanggal hari ini dalam format YYYY-MM-DD
            function getTodayDateString() {
                const today = new Date();
                const year = today.getFullYear();
                let month = today.getMonth() + 1;
                let day = today.getDate();

                if (month < 10) month = '0' + month;
                if (day < 10) day = '0' + day;

                return `${year}-${month}-${day}`;
            }

            // Atur tanggal minimal untuk check-in dan check-out menjadi hari ini
            const todayDate = getTodayDateString();
            checkInDateInput.setAttribute('min', todayDate);
            checkOutDateInput.setAttribute('min', todayDate);

            // Fungsi untuk menghitung total harga
            function calculateTotalPrice() {
                const checkInValue = checkInDateInput.value;
                const checkOutValue = checkOutDateInput.value;

                if (checkInValue && checkOutValue) {
                    const checkIn = new Date(checkInValue);
                    const checkOut = new Date(checkOutValue);

                    // Pastikan check-out setelah check-in
                    if (checkOut <= checkIn) {
                        totalPriceSpan.textContent = 'Rp 0';
                        // Opsional: berikan feedback ke pengguna jika tanggal tidak valid
                        // alert('Tanggal check-out harus setelah tanggal check-in.');
                        return;
                    }

                    const timeDiff = checkOut.getTime() - checkIn.getTime();
                    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Selisih hari

                    if (daysDiff > 0) {
                        const total = roomPricePerNight * daysDiff;
                        totalPriceSpan.textContent = 'Rp ' + total.toLocaleString('id-ID'); // Format ke Rupiah
                    } else {
                        totalPriceSpan.textContent = 'Rp 0';
                    }
                } else {
                    totalPriceSpan.textContent = 'Rp 0';
                }
            }

            // Event listener untuk perubahan tanggal check-in
            checkInDateInput.addEventListener('change', function() {
                // Atur minimal tanggal check-out agar tidak kurang dari tanggal check-in yang dipilih
                checkOutDateInput.setAttribute('min', this.value);
                // Jika tanggal check-out sebelumnya kurang dari tanggal check-in baru, reset atau atur sama
                if (checkOutDateInput.value < this.value) {
                    checkOutDateInput.value = this.value;
                }
                calculateTotalPrice();
            });

            // Event listener untuk perubahan tanggal check-out
            checkOutDateInput.addEventListener('change', calculateTotalPrice);

            // Panggil sekali saat halaman dimuat jika ada nilai lama dari old()
            calculateTotalPrice();
        });
    </script>

    @vite('resources/js/script2.js')
</body>

</html>