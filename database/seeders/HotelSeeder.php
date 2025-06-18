<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'gambar' => 'images/astonpasteur.jpeg', // Path relatif dari folder public
                'nama' => 'ASTON Pasteur',
                'rating' => 4.5,
                'kota_id' => 1,
                'lokasi' => 'Jl. Dr. Djunjunan No.162, Sukagalih, 40162, Bandung, Indonesia',
                'fasilitas' => json_encode(['WiFi di Lobi', 'WiFi di kamar', 'Kolam renang', 'Spa', 'Tempat parkir', 'AC']), // Konversi array ke JSON string
                'tentang' => 'Telepon: +62(228)2000777',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'images/astontropicana.jpeg', // Path relatif dari folder public
                'nama' => 'ASTON Tropicana',
                'rating' => 4.6,
                'kota_id' => 1,
                'lokasi' => 'Premier Plaza, Jalan Cihampelas 125 - 129, Sukajadi, 40131, Bandung, Indonesia',
                'fasilitas' => json_encode(['WiFi di Lobi', 'WiFi di kamar', 'Kolam renang', 'Spa', 'Tempat parkir', 'AC']), // Konversi array ke JSON string
                'tentang' => 'Telepon: +62(22)2030101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'images/socokb.jpeg', // Path relatif dari folder public
                'nama' => 'Super OYO Collection O Sweet Karina Bandung',
                'rating' => 4.5,
                'kota_id' => 1,
                'lokasi' => 'Jalan Terusan Babakan Jeruk IV, Sukajadi, 40163, Bandung, Indonesia',
                'fasilitas' => json_encode(['WiFi di Lobi', 'WiFi di kamar', 'Tempat parkir', 'AC']), // Konversi array ke JSON string
                'tentang' => 'Telepon: +62 (22) 2017140',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'images/hotel2.jpeg',
                'nama' => 'Hotel Lestari Yogyakarta',
                'rating' => 4.2,
                'kota_id' => 2,
                'lokasi' => 'Yogyakarta',
                'fasilitas' => json_encode(['Restoran', 'Parkir Gratis', 'AC']),
                'tentang' => 'Penginapan nyaman dekat objek wisata populer di Yogyakarta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'images/hotel3.jpeg',
                'nama' => 'Semarang View Hotel',
                'rating' => 4.0,
                'kota_id' => 3,
                'lokasi' => 'Semarang',
                'fasilitas' => json_encode(['Gym', 'Layanan Kamar', 'Resepsionis 24 Jam']),
                'tentang' => 'Hotel dengan pemandangan kota Semarang yang indah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data hotel lainnya di sini
        ]);
    }
}
