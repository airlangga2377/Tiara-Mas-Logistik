<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Cargo\CargoPengirimanBarang as CargoPengirimanBarang;
use App\Models\Cargo\CargoPengirimanDetail as CargoPengirimanDetail;
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
    public function pengirimanBarangs()
    {
        if($this->name == "superadmin"){
            $sql =  new CargoPengirimanDetail();
        } else {
            $sql =  $this->hasMany(CargoPengirimanDetail::class, "id_user"); 
        }
        $data = $sql
        ->selectRaw(
            'id_cargo_pengiriman_barangs,
            cargo_pengiriman_details.no_lmt,
            cargo_pengiriman_details.no_resi,
            nama_pengirim,
            nama_penerima,
            jenis_pengiriman,
            SUM(cargo_pengiriman_barangs.biaya) as biaya,
            SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
            keterangan,
            is_lunas,
            is_diterima,
            DATE(cargo_pengiriman_barangs.created_at) as created',
        ) 
        ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
        ->orderByDesc('cargo_pengiriman_barangs.created_at') 
        ->groupBy("cargo_pengiriman_details.no_lmt")
        ->get()
        ; 
        return $data ? $data : array();
    }

    /**
     * Get the Pengiriman manifest.
     * @param string $no_manifest A id manifest to update the detail pengiriman
    */ 
    public function truckManifests()
    {
        if($this->name == "superadmin"){
            $sql =  new CargoPengirimanDetail();
        } else {
            $sql =  $this->hasMany(CargoPengirimanDetail::class, "id_user"); 
        }

        // Untuk check semua manifest
        $data = $sql
        ->selectRaw(
            'id_cargo_pengiriman_barangs,
            no_manifest,
            no_pol,
            sopir,
            jenis_pengiriman,
            COUNT(no_manifest) as jumlah,
            DATE(cargo_pengiriman_barangs.created_at) as created',
        ) 
        ->where('no_manifest', '!=', null)
        ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
        ->orderByDesc('cargo_pengiriman_barangs.created_at') 
        ->groupBy("no_manifest") 
        ->get()
        ; 
        return $data ? $data : array();
    } 
}
