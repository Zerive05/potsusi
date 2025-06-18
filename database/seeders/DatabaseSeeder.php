<?php

namespace Database\Seeders;

use App\Models\Room;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat setidaknya satu user untuk login
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'zerive@example.com',
            'password' => bcrypt('12345678'), // Password default
        ]);

        $this->call([
            KotaSeeder::class,    // Panggil KotaSeeder terlebih dahulu
            HotelSeeder::class,   // Panggil HotelSeeder setelah KotaSeeder
            KamarSeeder::class,   // Panggil KamarSeeder setelah HotelSeeder
        ]);
    }
}
