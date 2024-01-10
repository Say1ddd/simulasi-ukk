<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{

    protected $fillable = [
        'tgl_keluar',
        'qty_keluar',
        'barang_id',
    ];

    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
