<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sublim extends Model
{
    protected $fillable = [

        'produksi_id',
        'shift',
        'kepala_regu',
        'operator',
        'no_mc',
        'hasil_akhir_yard',
        'hasil_pcs',
        'sisa_kain',
        'keterangan',
        'selesai_at'

    ];

    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }
}