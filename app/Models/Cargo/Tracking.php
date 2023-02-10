<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'trackings';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tracking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD:app/Models/Cargo/Tracking.php
        'no_lmt',  
        'id_message_tracking',  
        'id_message_status_pembayaran',  
        'id_status_pembayaran',  
        'id_user',  
=======
        'kota',  
        'kode_kota',  
        'wilayah',
        'kode_wilayah',  
        'alamat',  
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Models/Cargo/Bus/Wilayah.php
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
<<<<<<< HEAD:app/Models/Cargo/Tracking.php
    ]; 
=======
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
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Models/Cargo/Bus/Wilayah.php
}
