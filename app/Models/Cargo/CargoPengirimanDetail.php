<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cargo\CargoPengirimanBarang as CargoPengirimanBarang;

class CargoPengirimanDetail extends Model
{
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'cargo_pengiriman_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_cargo_pengiriman_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_manifest', 
        'no_lmt', 
        'no_resi', 

        'nama_pengirim', 
        'nomor_pengirim',
        'nama_penerima', 
        'nomor_penerima',

        'sopir',
        'kernet', 
        'no_pol', 

        'is_lunas', 
        'is_diterima', 
        
        'is_pengecualian',
        // jenis pengiriman, apakah truk atau bis
        'jenis_pengiriman', 

        // orang pengirim apakah umum, distributor
        'jenis_pengirim', 

        // apakah menggunakan biaya kubikasi atau biaya berat, dicek paling menguntungkan pihak tiara
        'jenis_biaya', 
        
        // pembayaran untuk sorting agar lebih cepat
        'id_status_pembayaran', 

        'asal',
        'tujuan', 
        
        'keterangan', 
        'jenis_barang_detail', 

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
    ]; 

    /**
     * Get the Pengiriman Cargo.
    */ 
    public function barangs($no_lmt)
    {  
        $sql = $this->hasMany(CargoPengirimanBarang::class, "no_lmt", "no_lmt"); 
        
        $data = array();
        try {
            $data = $sql
            ->select(
                'jumlah_barang',
                'code',
                'jenis_barang',
                'berat',
                'biaya',
            )
            ->where('no_lmt', ($no_lmt ? decrypt($no_lmt) : $this->no_lmt))
            ->get(); 
        } catch (\Throwable $th) { 
            print($th->getMessage());
        } 
        
        // $data->detail = $this->detail(decrypt($no_lmt ? $no_lmt : $this->no_lmt));
        return $data ? $data : array();
    }

    /**
     * Get the Pengiriman Cargo.
    */ 
    public function summary($no_lmt)
    {  
        $sql = $this->hasMany(CargoPengirimanBarang::class, "no_lmt", "no_lmt"); 
        $data = $sql
        ->selectRaw(
            'SUM(biaya) as biaya,
            SUM(jumlah_barang) as jumlah_barang,
            cargo_pengiriman_details.keterangan, 
            DATE(cargo_pengiriman_details.created_at) as created',
        )
        ->leftJoin("cargo_pengiriman_details", "cargo_pengiriman_details.no_lmt", "cargo_pengiriman_barangs.no_lmt")
        ->where("cargo_pengiriman_details.no_lmt", ($no_lmt ? decrypt($no_lmt) : $this->no_lmt))
        ->orderByDesc('cargo_pengiriman_details.created_at') 
        ->groupBy("cargo_pengiriman_details.no_lmt")
        ->first()
        ;  
        $this->biaya = $data->biaya;
        $this->keterangan = $data->keterangan; 
        return $data;
    }
    
    /**
     * Get the Pengiriman Cargo.
    */ 
    public function truck($no_manifest)
    {   
        $sql = $this->hasOne(Truck::class, "no_pol", "no_pol"); 
        $data = $sql
        ->selectRaw(
            'no_pol,
            sopir',
        )
        ->where("no_manifest", $no_manifest)
        ->groupBy("no_manifest")
        ->first()
        ;
        return $data;
    }
}
