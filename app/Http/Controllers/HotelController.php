<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();
        $hotel = Hotel::findOrFail($id);
        $kamar = Kamar::where('hotel_id', $hotel->id)->get();
        return view('kamar', compact('user', 'hotel', 'kamar'));
    }
}
