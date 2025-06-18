<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function pesan($id)
    {
        $user = Auth::user();
        $kamar = Kamar::findOrFail($id);
        return view('pesan', compact('user', 'kamar'));
    }
}
