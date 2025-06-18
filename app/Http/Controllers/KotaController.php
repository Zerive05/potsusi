<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KotaController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();
        $hotel = Hotel::where('kota_id', $id)->get();
        // Logika untuk menampilkan detail kota berdasarkan ID
        // Misalnya, mengambil data kota dari database
        $kota = Kota::findOrFail($id);

        // Mengembalikan view dengan data kota
        return view('hotel', compact('user', 'kota', 'hotel'));
    }
}
