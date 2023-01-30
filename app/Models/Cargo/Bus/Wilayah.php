<?php

namespace App\Models\Cargo\Bus;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'area_bus';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_area_bus';

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
        'alamat',  
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
    public static function findByKode($kode_kota)
    { 
        return Wilayah::class::where('kode_kota', $kode_kota)->get();
    }

    /**
     * Get by kota.
    */ 
    public static function findByKota($kota)
    { 
        return Wilayah::class::where('kota', $kota)->get();
    }

    /**
     * Get by wilayah by kode wilayah.
    */ 
    public static function findByKodeWilayah($kode_wilayah)
    { 
        return Wilayah::class::where('kode_wilayah', $kode_wilayah)->get();
    }

    /**
     * Get by kota by wilayah.
    */ 
    public static function findByWilayah($wilayah)
    { 
        return Wilayah::class::where('wilayah', $wilayah)->get();
    }
}
