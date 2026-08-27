<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\StokKain;
use App\Models\KainMasuk;
use App\Models\KainKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total stok semua kain
        $totalStok = StokKain::sum('stok');

        // Total kain masuk
        $totalKainMasuk = KainMasuk::sum('jumlah');

        // Total kain keluar
        $totalKainKeluar = KainKeluar::sum('jumlah_terpakai');

        // Total produksi
        $totalProduksi = Produksi::count();

        // Produksi terbaru
        $produksiTerbaru = Produksi::latest()
            ->take(5)
            ->get();

        // Stok kain terendah
        $stokTerendah = StokKain::orderBy('stok', 'asc')
            ->take(5)
            ->get();

        // Grafik produksi per bulan
        $produksiPerBulan = Produksi::selectRaw(
                "MONTH(created_at) as bulan, COUNT(*) as total"
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->map(function ($item) {

                $namaBulan = [
                    1 => 'Jan',
                    2 => 'Feb',
                    3 => 'Mar',
                    4 => 'Apr',
                    5 => 'Mei',
                    6 => 'Jun',
                    7 => 'Jul',
                    8 => 'Agu',
                    9 => 'Sep',
                    10 => 'Okt',
                    11 => 'Nov',
                    12 => 'Des',
                ];

                return [
                    'bulan' => $namaBulan[$item->bulan] ?? $item->bulan,
                    'total' => $item->total
                ];
            });

        // Status produksi
        $statusProduksi = Produksi::selectRaw(
                'status, COUNT(*) as total'
            )
            ->groupBy('status')
            ->get();

        return view('dashboard', compact(
            'totalStok',
            'totalKainMasuk',
            'totalKainKeluar',
            'totalProduksi',
            'produksiTerbaru',
            'stokTerendah',
            'produksiPerBulan',
            'statusProduksi'
        ));
    }
}