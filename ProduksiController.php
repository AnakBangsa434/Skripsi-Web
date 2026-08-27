<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KainMasuk;
use App\Models\Produksi;
use App\Models\StokKain;
use App\Models\KainKeluar;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class ProduksiController extends Controller
{

public function index(Request $request)
{
    $query = Produksi::query();

    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('no_produksi', 'like', '%' . $request->search . '%')
              ->orWhere('nama_produk', 'like', '%' . $request->search . '%')
              ->orWhere('nama_kain', 'like', '%' . $request->search . '%');

        });

    }

    $produksi = $query->get();

    return view('produksi', compact('produksi'));

}

public function create()
{
    $stokKain = StokKain::where('stok', '>', 0)
        ->orderBy('nama_kain')
        ->get();

    return view('tambah-produksi', compact('stokKain'));
}

public function store(Request $request)
{
    $request->validate([
        'no_produksi'      => 'required|string|max:255',
        'nama_produk'      => 'required|string|max:255',
        'nama_kain'        => 'required|string|max:255',
        'warna_produksi'   => 'required|string|max:255',
        'temperatur_mc'    => 'required|numeric',
        'speed_mc'         => 'required|numeric',
        'jumlah_awal_yard' => 'required|numeric|min:0',
        'order_pcs'        => 'required|integer|min:0',
        'kode_motif'       => 'nullable|string|max:255',
    ]);

    DB::transaction(function () use ($request) {

        // Cari stok kain berdasarkan nama kain
        $stok = StokKain::where('nama_kain', $request->nama_kain)
            ->lockForUpdate()
            ->firstOrFail();

        // Cek apakah stok cukup
        if ($stok->stok < $request->jumlah_awal_yard) {
            abort(422, 'Stok kain tidak mencukupi.');
        }

        // Simpan data produksi
        $produksi = Produksi::create([
            'no_produksi'      => $request->no_produksi,
            'nama_produk'      => $request->nama_produk,
            'nama_kain'        => $request->nama_kain,
            'warna_produksi'   => $request->warna_produksi,
            'temperatur_mc'    => $request->temperatur_mc,
            'speed_mc'         => $request->speed_mc,
            'jumlah_awal_yard' => $request->jumlah_awal_yard,
            'order_pcs'        => $request->order_pcs,
            'kode_motif'       => $request->kode_motif,
            'status'           => 'Inspect',
        ]);

        // Kurangi stok kain
        $stok->stok -= $request->jumlah_awal_yard;
        $stok->save();

        // Simpan ke kain_keluar
        KainKeluar::create([
            'kain_id'        => $stok->id,
            'produksi_id'    => $produksi->id,
            'nama_kain'      => $stok->nama_kain,
            'jumlah'         => $request->jumlah_awal_yard,
            'jumlah_terpakai'=> $request->jumlah_awal_yard,
            'sisa_yard'      => 0,
            'tanggal'        => now()->toDateString(),
            'keterangan'     => 'Pemakaian kain untuk produksi ' . $request->no_produksi,
        ]);
    });

    return redirect('/produksi')
        ->with('success', 'Data produksi berhasil disimpan dan stok kain berhasil dikurangi.');
}

public function destroy($id)
    {

        $produksi = Produksi::find($id);

        $produksi->delete();

        return redirect('/produksi');

    }

    public function edit($id)
    {

        $produksi = Produksi::find($id);

        return view('edit-produksi', compact('produksi'));

    }

    public function update(Request $request, $id)
    {

        $produksi = Produksi::find($id);

        $produksi->update([

            'no_produksi' => $request->no_produksi,

            'nama_produk' => $request->nama_produk,

            'nama_kain' => $request->nama_kain,

            'jumlah_awal_yard' => $request->jumlah_awal_yard,

            'status' => $request->status

        ]);

        return redirect('/produksi');

    
        

    }

    public function nextProcess($id)
    {

        $produksi = Produksi::find($id);

        if($produksi->status == 'Inspect'){

            $produksi->status = 'Printing';

        }elseif($produksi->status == 'Printing'){

            $produksi->status = 'Sublim';

        }elseif($produksi->status == 'Sublim'){

            $produksi->status = 'Lasercut';

        }elseif($produksi->status == 'Lasercut'){

            $produksi->status = 'Packing';

        }

        $produksi->save();

        return redirect('/produksi');

    }

    public function generateQR($id)
{
    $produksi = Produksi::findOrFail($id);

    $result = Builder::create()
        ->writer(new PngWriter())
        ->data(route('operator.scan', $produksi->id))
        ->size(300)
        ->margin(10)
        ->build();

    $qr = base64_encode($result->getString());

    return view('produksi.qrcode', compact('produksi', 'qr'));
}


public function operator($id)
{

    $produksi = Produksi::findOrFail($id);

    return view('operator',compact('produksi'));

}

public function simpanOperator(Request $request, $id)
{

    $produksi = Produksi::findOrFail($id);

    // Simpan hasil operator
    $produksi->yard_terpakai = $request->yard_terpakai;

    $produksi->sisa_yard = $request->sisa_yard;

    $produksi->hasil_produksi = $request->hasil_produksi;

    $produksi->keterangan = $request->keterangan;

    // Naikkan status
    if($produksi->status == 'Inspect'){

        $produksi->status = 'Printing';

    }elseif($produksi->status == 'Printing'){

        $produksi->status = 'Sublim';

    }elseif($produksi->status == 'Sublim'){

        $produksi->status = 'Lasercut';

    }elseif($produksi->status == 'Lasercut'){

        $produksi->status = 'Packing';

    }

    $produksi->save();

    // Kembalikan sisa kain ke stok
    $stok = StokKain::find($request->kain_id);

    if($stok){

        $stok->stok += $request->sisa_yard;

        $stok->save();

    }
    return redirect('/operator/'.$id)
           ->with('success','Data berhasil disimpan.');


}

 

}