<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function pesan($id)
    {
        $user = Auth::user();
        $kamar = Kamar::findOrFail($id);
        $hotel = Hotel::where('id', $kamar->hotel_id)->first();
        $kota = Kota::where('id', $hotel->kota_id)->first();
        return view('pesan', compact('user', 'kamar', 'hotel', 'kota'));
    }
}
