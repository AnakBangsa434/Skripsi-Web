<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKain extends Model
{
    protected $table = 'stok_kain';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'nama_kain',
        'jenis_kain',
        'warna',
        'stok',
    ];
}