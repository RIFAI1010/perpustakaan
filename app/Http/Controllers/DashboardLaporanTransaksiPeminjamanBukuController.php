<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardLaporanTransaksiPeminjamanBukuController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_laporan_transaksi_peminjaman_buku.dashboard_laporan_transaksi_peminjaman_buku', [
            'data_transaksi_peminjaman_buku' => DB::table('laporan_transaksi_peminjaman_buku')->get(),
        ]);
    }
}
