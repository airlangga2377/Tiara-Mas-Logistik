<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class KodeKota extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'kode_kotas';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_kode_kota';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kota',  
        'kode_kota',  
        'wilayah',  
        'kode_wilayah',  
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
    ];

    /**
     * Get by kota by kode.
    */ 
    public static function findByKode($kodeKota)
    { 
        return Distributor::class::where('kode_kota', $kodeKota)->get();
    }

    /**
     * Get by kota.
    */ 
    public static function findByKota($kota)
    { 
        return Distributor::class::where('kota', $kota)->get();
    }

    /**
     * Get by wilayah by kode wilayah.
    */ 
    public static function findByKodeWilayah($kode_wilayah)
    { 
        return Distributor::class::where('kode_wilayah', $kode_wilayah)->get();
    }

    /**
     * Get by kota by wilayah.
    */ 
    public static function findByWilayah($wilayah)
    { 
        return Distributor::class::where('wilayah', $wilayah)->get();
    }
}
