<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KainKeluar;

class KainKeluarController extends Controller
{
    public function index()
    {
        $kainKeluar = KainKeluar::latest()->get();

        return view('kain-keluar', compact('kainKeluar'));
    }
}