<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Cargo\CargoPengirimanBarang as CargoPengirimanBarang;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'status_user', 
        'is_user_superadmin', 
        'kota', 
        'wilayah',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    /**
     * Get Detail the Pengiriman Cargo.
    */ 
    public function allDetailCargoPengirimanBarang()
    {
        if($this->name == "superadmin"){
            $sql =  new CargoPengirimanBarang();
        } else {
            $data =  $this->hasMany(CargoPengirimanBarang::class, "id_user");
        }
        $data =  $sql
        ->orderByDesc('created_at')
        ->get();
        return $data ? $data : array();
    }

    /**
     * Get the Pengiriman Cargo.
    */ 
    public function allCargoPengirimanBarang()
    {
        if($this->name == "superadmin"){
            $sql =  new CargoPengirimanBarang();
        } else {
            $sql =  $this->hasMany(CargoPengirimanBarang::class, "id_user"); 
        }
        $data = $sql
        ->selectRaw(
            'id_cargo_pengiriman_barangs,
            no_lmt,
            no_resi,
            nama_pengirim,
            nama_penerima,
            SUM(cargo_pengiriman_barangs.biaya) as biaya,
            SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
            keterangan,
            is_lunas,
            is_diterima,
            DATE(created_at) as created',
        ) 
        ->orderByDesc('cargo_pengiriman_barangs.created_at') 
        ->groupBy("no_lmt")
        ->get()
        ; 
        return $data ? $data : array();
    }
}
