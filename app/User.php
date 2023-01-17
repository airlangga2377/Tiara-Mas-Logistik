<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Cargo\CargoPengirimanBarang as CargoPengirimanBarang;
use App\Models\Cargo\CargoPengirimanDetail as CargoPengirimanDetail;
use App\Models\Cargo\KodeKota as KodeKota;

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
        'id_kode_kota',  
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
    public function pengirimanBarangs($kotaAdmin)
    {
        if($this->name == "superadmin"){
            $sql =  new CargoPengirimanDetail();
            $data = $sql
            ->selectRaw(
                'id_cargo_pengiriman_barang,
                cargo_pengiriman_details.no_lmt,
                cargo_pengiriman_details.no_resi,
                cargo_pengiriman_details.no_manifest,
                nama_pengirim,
                nama_penerima,
                asal,
                tujuan,
                jenis_pengiriman,
                SUM(cargo_pengiriman_barangs.biaya) as biaya,
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                MAX(message_trackings.id_message_tracking) as last_id_message_tracking,
                keterangan,
                status_pembayarans.id_status_pembayaran,
                is_lunas,
                is_diterima,
                DATE(cargo_pengiriman_details.created_at) as created',
            ) 
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran") 
            
            ->orderByDesc('cargo_pengiriman_barangs.created_at') 
            ->groupBy("cargo_pengiriman_details.no_lmt")
            ->get()
            ; 
        } else {
            $sql =  new CargoPengirimanDetail();
            $data = $sql
            ->selectRaw(
                'id_cargo_pengiriman_barang,
                cargo_pengiriman_details.no_lmt,
                cargo_pengiriman_details.no_resi,
                cargo_pengiriman_details.no_manifest,
                nama_pengirim,
                nama_penerima,
                asal,
                tujuan,
                jenis_pengiriman,
                SUM(cargo_pengiriman_barangs.biaya) as biaya,
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                MAX(message_trackings.id_message_tracking) as last_id_message_tracking,
                keterangan,
                status_pembayarans.id_status_pembayaran,
                is_lunas,
                is_diterima,
                DATE(cargo_pengiriman_details.created_at) as created',
            ) 
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran") 
            
            ->orWhere('tujuan', $kotaAdmin)
            ->orWhere('asal', $kotaAdmin)
            ->orderByDesc('cargo_pengiriman_barangs.created_at') 
            ->groupBy("cargo_pengiriman_details.no_lmt")
            ->get()
            ; 
        }
        // dd($data);
        return $data ? $data : array();
    }

    /**
     * Get the Pengiriman manifest.
    */ 
    public function truckManifests($tujuan)
    {  
        // Untuk check semua manifest 
        $data = CargoPengirimanDetail::selectRaw(
            'id_cargo_pengiriman_detail,
            no_manifest,
            cargo_pengiriman_details.no_pol,
            sopir,
            sopir_utama,
            jenis_pengiriman,
            asal,
            tujuan,
            MAX(message_trackings.id_message_tracking) as last_id_message_tracking,
            DATE(cargo_pengiriman_details.created_at) as created',
        )    
        ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
        ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
        ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
        ->where('no_manifest', "!=", null)
        ->where('tujuan', $tujuan)
        ->orWhere('asal', $tujuan)
        ->orderByDesc('cargo_pengiriman_details.created_at') 
        ->groupBy("cargo_pengiriman_details.no_manifest")
        ->distinct()
        ->get()
        ; 
        return $data ? $data : array();
    } 

    /**
     * Get the kode Kota.
    */ 
    public function kodeKota(){
        if($this->name == "superadmin"){
            $sql =  new KodeKota();
        } else {
            $sql =  $this->belongsTo(KodeKota::class, "id_kode_kota"); 
        }
        $data = $sql
        ->select(
            'kota',
            'wilayah',
        )
        ->first();
        return $data ? $data : new KodeKota();
    }
}
