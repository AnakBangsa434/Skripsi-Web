<?php

namespace App\Http\Controllers;

use App\Models\KainMasuk;
use App\Models\StokKain;
use Illuminate\Http\Request;

class KainMasukController extends Controller
{
    public function index()
    {
        $kainMasuk = KainMasuk::latest('tanggal_masuk')->get();

        return view('kain-masuk', compact('kainMasuk'));
    }

    public function create()
    {
         return view('tambah-kain-masuk');
    }
public function store(Request $request)
{
    $request->validate([
        'nama_kain'     => 'required|string|max:255',
        'jenis_kain'    => 'required|string|max:255',
        'warna'         => 'required|string|max:255',
        'supplier'      => 'required|string|max:255',
        'jumlah'        => 'required|numeric|min:0',
        'jumlah_meter'  => 'required|numeric|min:0',
        'jumlah_pcs'    => 'required|integer|min:0',
        'tanggal_masuk' => 'required|date',
    ]);

    // Simpan ke kain_masuks
    KainMasuk::create([
        'nama_kain'     => $request->nama_kain,
        'jenis_kain'    => $request->jenis_kain,
        'warna'         => $request->warna,
        'supplier'      => $request->supplier,
        'jumlah'        => $request->jumlah,
        'jumlah_meter'  => $request->jumlah_meter,
        'jumlah_pcs'    => $request->jumlah_pcs,
        'tanggal_masuk' => $request->tanggal_masuk,
    ]);

    // Cari stok kain
    $stok = StokKain::where(
        'nama_kain',
        $request->nama_kain
    )->first();

    if ($stok) {

        // Tambah stok
        $stok->stok += $request->jumlah;

        $stok->jenis_kain = $request->jenis_kain;
        $stok->warna = $request->warna;

        $stok->save();

    } else {

        // Buat stok baru
        StokKain::create([
            'nama_kain'  => $request->nama_kain,
            'jenis_kain' => $request->jenis_kain,
            'warna'      => $request->warna,
            'stok'       => $request->jumlah,
        ]);
    }

    return redirect('/kain-masuk')
        ->with(
            'success',
            'Data kain masuk dan stok kain berhasil disimpan.'
        );
}

    public function edit($id)
    {
        $kainMasuk = KainMasuk::findOrFail($id);

        return view('kain-masuk-edit', compact('kainMasuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kain' => 'required|string|max:255',
            'jenis_kain' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'jumlah_meter' => 'required|numeric|min:0',
            'jumlah_pcs' => 'required|integer|min:0',
            'tanggal_masuk' => 'required|date',
        ]);

        $kainMasuk = KainMasuk::findOrFail($id);

        $kainMasuk->update([
            'nama_kain' => $request->nama_kain,
            'jenis_kain' => $request->jenis_kain,
            'warna' => $request->warna,
            'supplier' => $request->supplier,
            'jumlah' => $request->jumlah,
            'jumlah_meter' => $request->jumlah_meter,
            'jumlah_pcs' => $request->jumlah_pcs,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect('/kain-masuk')
            ->with('success', 'Data kain masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kainMasuk = KainMasuk::findOrFail($id);

        $kainMasuk->delete();

        return redirect('/kain-masuk')
            ->with('success', 'Data kain masuk berhasil dihapus.');
    }
}