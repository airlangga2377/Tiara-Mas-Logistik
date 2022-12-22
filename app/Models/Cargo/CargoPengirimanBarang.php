<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class CargoPengirimanBarang extends Model
{ 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_resi', 

        'nama_pengirim', 
        'nomor_pengirim',
        'nama_penerima', 
        'nomor_penerima',

        'jenis_barang', 
        'jumlah_barang',
        'keterangan',

        'sopir',
        'kernet', 
        
        'biaya',
        'is_lunas', 
        'is_diterima', 

        'id_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
