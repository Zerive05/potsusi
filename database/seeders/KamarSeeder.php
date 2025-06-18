<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID dari setiap hotel berdasarkan nama
        $astonPasteur = DB::table('hotels')->where('nama', 'ASTON Pasteur')->first();
        $astonTropicana = DB::table('hotels')->where('nama', 'ASTON Tropicana')->first();
        $superOYOCSKB = DB::table('hotels')->where('nama', 'Super OYO Collection O Sweet Karina Bandung')->first();
        $hotelLestariYogyakarta = DB::table('hotels')->where('nama', 'Hotel Lestari Yogyakarta')->first();
        $semarangViewHotel = DB::table('hotels')->where('nama', 'Semarang View Hotel')->first();

        // Data kamar umum yang akan digunakan untuk setiap hotel
        $kamarTipe = [
            'Standard Single',
            'Standard Double',
            'Deluxe Twin',
            'Deluxe King',
            'Superior Double',
            'Superior Twin',
            'Executive Suite',
            'Family Room',
            'Business Suite',
            'Presidential Suite'
        ];

        // Fasilitas umum untuk kamar
        $fasilitasUmum = [
            ['AC', 'TV', 'WiFi'],
            ['AC', 'TV', 'WiFi', 'Kamar Mandi Pribadi'],
            ['AC', 'TV', 'WiFi', 'Minibar', 'Mesin Kopi'],
            ['AC', 'TV Layar Datar', 'Bathtub', 'Ruang Tamu'],
            ['AC', 'TV Kabel', 'Brankas', 'Meja Kerja']
        ];

        // Fungsi pembantu untuk membuat data kamar untuk satu hotel
        $createKamarData = function ($hotelId, $hotelNama) use ($kamarTipe, $fasilitasUmum) {
            $kamars = [];
            for ($i = 0; $i < 10; $i++) {
                $tipe = $kamarTipe[$i % count($kamarTipe)]; // Pilih tipe kamar secara bergantian
                $harga = rand(400000, 2500000); // Harga acak
                $kapasitas = ($tipe == 'Standard Single') ? 1 : (($tipe == 'Family Room') ? 4 : 2);
                $deskripsi = "Kamar " . $tipe . " yang nyaman di " . $hotelNama . ".";
                $fasilitas = $fasilitasUmum[array_rand($fasilitasUmum)]; // Pilih fasilitas acak

                $kamars[] = [
                    'hotel_id' => $hotelId,
                    'nama_kamar' => $tipe . ' - ' . ($i + 1), // Nama unik per kamar
                    'tipe_kamar' => $tipe,
                    'harga' => $harga,
                    'kapasitas' => $kapasitas,
                    'deskripsi' => $deskripsi,
                    'fasilitas' => json_encode($fasilitas),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            return $kamars;
        };

        // Sisipkan kamar untuk ASTON Pasteur
        if ($astonPasteur) {
            $this->command->info('Menyisipkan 10 kamar untuk ASTON Pasteur...');
            DB::table('kamars')->insert(
                $createKamarData($astonPasteur->id, $astonPasteur->nama)
            );
        } else {
            $this->command->warn('ASTON Pasteur tidak ditemukan. Kamar untuk hotel ini tidak disisipkan.');
        }

        // Sisipkan kamar untuk ASTON Tropicana
        if ($astonTropicana) {
            $this->command->info('Menyisipkan 10 kamar untuk ASTON Tropicana...');
            DB::table('kamars')->insert(
                $createKamarData($astonTropicana->id, $astonTropicana->nama)
            );
        } else {
            $this->command->warn('ASTON Tropicana tidak ditemukan. Kamar untuk hotel ini tidak disisipkan.');
        }

        // Sisipkan kamar untuk Super OYO Collection O Sweet Karina Bandung
        if ($superOYOCSKB) {
            $this->command->info('Menyisipkan 10 kamar untuk Super OYO Collection O Sweet Karina Bandung...');
            DB::table('kamars')->insert(
                $createKamarData($superOYOCSKB->id, $superOYOCSKB->nama)
            );
        } else {
            $this->command->warn('Super OYO Collection O Sweet Karina Bandung tidak ditemukan. Kamar untuk hotel ini tidak disisipkan.');
        }

        // Sisipkan kamar untuk Hotel Lestari Yogyakarta
        if ($hotelLestariYogyakarta) {
            $this->command->info('Menyisipkan 10 kamar untuk Hotel Lestari Yogyakarta...');
            DB::table('kamars')->insert(
                $createKamarData($hotelLestariYogyakarta->id, $hotelLestariYogyakarta->nama)
            );
        } else {
            $this->command->warn('Hotel Lestari Yogyakarta tidak ditemukan. Kamar untuk hotel ini tidak disisipkan.');
        }

        // Sisipkan kamar untuk Semarang View Hotel
        if ($semarangViewHotel) {
            $this->command->info('Menyisipkan 10 kamar untuk Semarang View Hotel...');
            DB::table('kamars')->insert(
                $createKamarData($semarangViewHotel->id, $semarangViewHotel->nama)
            );
        } else {
            $this->command->warn('Semarang View Hotel tidak ditemukan. Kamar untuk hotel ini tidak disisipkan.');
        }
    }
}
