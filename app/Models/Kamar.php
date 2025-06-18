<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars'; // Pastikan nama tabel benar

    public function isAvailable($checkInDate, $checkOutDate)
    {
        // Cek apakah ada pemesanan yang tumpang tindih
        $overlappingBookings = Pesan::where('kamar_id', $this->id)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in', '<', $checkInDate)
                            ->where('check_out', '>', $checkOutDate);
                    });
            })
            ->whereIn('status', ['pending', 'confirmed']) // Hanya cek status yang relevan
            ->count();

        return $overlappingBookings === 0;
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
