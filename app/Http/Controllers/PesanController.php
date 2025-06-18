<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $pesanan = Pesan::all();
        return view('pesanansaya', compact('user', 'pesanan'));
    }
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $kamar = Kamar::findOrFail($id);

        // Konversi tanggal check-in dan check-out menjadi objek Carbon
        $checkInDate = Carbon::parse($request->check_in_date);
        $checkOutDate = Carbon::parse($request->check_out_date);

        // Hitung selisih hari
        $jumlahHari = $checkOutDate->diffInDays($checkInDate);

        // Pastikan jumlah hari tidak nol jika check-in dan check-out pada hari yang sama (hitung sebagai 1 malam)
        if ($jumlahHari <= 0 && $checkInDate->equalTo($checkOutDate)) {
            $jumlahHari = 1;
        }

        // Hitung total harga
        // Asumsi method harga() pada model Kamar mengembalikan harga per malam
        $totalHarga = $kamar->harga * $jumlahHari * (-1);

        // Validasi dasar untuk memastikan tanggal check-out setelah check-in
        if ($checkOutDate->lessThan($checkInDate)) {
            return redirect()->back()->withErrors(['check_out_date' => 'Tanggal check-out tidak boleh sebelum tanggal check-in.']);
        }

        DB::table('pesans')->insert([
            'user_id' => $user->id,
            'kamar_id' => $kamar->id,
            'check_in' => $request->check_in_date,
            'check_out' => $request->check_out_date,
            'metode_pembayaran' => $request->payment_method,
            'total_harga' => $totalHarga,
            'kode_pembayaran' => $this->generateRandomPaymentCode(),
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Pemesanan berhasil dibuat');
    }

    /**
     * Menghasilkan kode pembayaran acak.
     *
     * @param int $length
     * @return string
     */
    private function generateRandomPaymentCode($length = 11)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'TRX-' . $randomString;
    }
}
