<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenungguController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = auth()->user();

        return response()->json([
            'success' => true,
            'message' => 'List Data Menunggu',
            'antri_peminjaman' => DB::table('user_mengantri_peminjaman_buku')
                ->join('bukus', 'user_mengantri_peminjaman_buku.buku_id', '=', 'bukus.id')
                ->select(['user_mengantri_peminjaman_buku.*','bukus.id', 'bukus.judul', 'bukus.image'])
                ->where('user_mengantri_peminjaman_buku.peminjam_id', $currentUser->id)
                ->get(),
            'antri_pengembalian' => DB::table('user_mengantri_pengembalian_buku')
                ->join('bukus', 'user_mengantri_pengembalian_buku.buku_id', '=', 'bukus.id')
                ->select(['user_mengantri_pengembalian_buku.*','bukus.id', 'bukus.judul', 'bukus.image'])
                ->where('user_mengantri_pengembalian_buku.peminjam_id', $currentUser->id)
                ->get(),
            'denda' => DB::table('laporan_peminjaman_buku_berlangsung')
                ->join('bukus', 'laporan_peminjaman_buku_berlangsung.buku_id', '=', 'bukus.id')
                ->select(['laporan_peminjaman_buku_berlangsung.*','bukus.id', 'bukus.judul', 'bukus.image'])
                ->where('laporan_peminjaman_buku_berlangsung.peminjam_id', $currentUser->id)
                ->where('laporan_peminjaman_buku_berlangsung.denda', '>', '0')
                ->where('laporan_peminjaman_buku_berlangsung.peminjam_id', $currentUser->id)->get(),
        ], 200);
    }
}
