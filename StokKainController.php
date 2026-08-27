<?php

namespace App\Http\Controllers;

use App\Models\StokKain;

class StokKainController extends Controller
{

    public function index()
    {

        $stok = StokKain::orderBy('nama_kain')->get();

        return view('stok-kain', compact('stok'));

    }

}