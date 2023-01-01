<?php

namespace App\Models\Cargo\Bus;

use Illuminate\Database\Eloquent\Model;

class PengirimanBus extends Model
{
    protected $table = 'pengiriman_bus';
    protected $fillable = [
        'resi', 
        'nama_pengirim',
        'telepon_pengirim', 
        'nama_penerima', 
        'telepon_penerima', 
        'asal_barang', 
        'tujuan_barang', 
        'jenis_barang', 
        'nama_barang',
        'berat_barang',
        'jumlah_barang',
        'harga_barang',
        'kode_user',
    ];
}