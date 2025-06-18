<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Saya | {{ $user->name ?? 'Pengguna' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style2.css') {{-- Sesuaikan jika ada CSS spesifik untuk tabel pesanan --}}
    <style>
        /* Tambahkan atau sesuaikan CSS ini sesuai kebutuhan */
        .dashboard-container {
            padding: 20px;
            margin: 20px auto;
            max-width: 1000px;
            /* Sesuaikan lebar container */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header {
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }

        .welcome-message {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
        }

        .order-table-container {
            overflow-x: auto;
            /* Agar tabel bisa discroll jika terlalu lebar */
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
            /* Agar konten di sel sejajar di atas */
        }

        th {
            background-color: #f2f2f2;
            color: #555;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .empty-state {
            text-align: center;
            padding: 20px;
            color: #777;
            font-style: italic;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-paid {
            color: green;
            font-weight: bold;
        }

        .status-cancelled {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="dashboard-container">
        <h1 class="dashboard-header">Daftar Pesanan Anda</h1>
        <p class="welcome-message">
            Halo, **{{ $user->name ?? 'Pengguna' }}**!
            <br>Berikut adalah riwayat pesanan Anda.
        </p>

        <div class="order-table-container">
            @if ($pesanan->isEmpty())
            <p class="empty-state">Anda belum memiliki pesanan aktif atau riwayat pesanan.</p>
            @else
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Kamar ID</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Jumlah Malam</th> {{-- Kolom baru untuk jumlah malam --}}
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Kode Pembayaran</th>
                        <th>Status</th>
                        {{-- Tambahkan kolom aksi jika diperlukan, misal untuk detail/pembatalan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kamar_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->check_in)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->check_out)->format('d M Y') }}</td>
                        <td>
                            @php
                            $checkIn = \Carbon\Carbon::parse($item->check_in);
                            $checkOut = \Carbon\Carbon::parse($item->check_out);
                            $jumlahMalam = $checkOut->diffInDays($checkIn);
                            // Jika check-in dan check-out di hari yang sama, hitung 1 malam
                            if ($jumlahMalam === 0 && $checkIn->equalTo($checkOut)) {
                            $jumlahMalam = 1;
                            }
                            @endphp
                            {{ $jumlahMalam }} malam
                        </td>
                        <td>{{ $item->metode_pembayaran }}</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $item->kode_pembayaran }}</td>
                        <td>
                            <span class="status-{{ strtolower($item->status) }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    @vite('resources/js/script2.js') {{-- Pertahankan jika script ini relevan untuk dashboard umum --}}
</body>

</html>