<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class CargoPengirimanBarang extends Model
{ 
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'cargo_pengiriman_barangs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_cargo_pengiriman_barangs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_resi', 
        'no_lmt', 

        'nama_pengirim', 
        'nomor_pengirim',
        'nama_penerima', 
        'nomor_penerima',

        'jenis_barang', 
        'jumlah_barang',
        'keterangan',

        'sopir',
        'kernet', 
        'no_pol', 

        'panjang', 
        'lebar', 
        'tinggi', 
        'berat', 

        'biaya',
        'is_lunas', 
        'is_diterima', 
        
        'is_pengecualian',

        // jenis pengiriman, apakah truk atau bis
        'jenis_pengiriman', 

        // orang pengirim apakah umum, distributor
        'jenis_pengirim', 

        // apakah menggunakan biaya kubikasi atau biaya berat, dicek paling menguntungkan pihak tiara
        'jenis_biaya', 

        'tujuan', 

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
    public function cargoDetailByNoLmT($no_lmt)
    {  
        if($no_lmt){ 
            $data = CargoPengirimanBarang::
            selectRaw(
                'no_lmt,
                nama_pengirim,
                nama_penerima,

                sopir,
                no_pol,
                tujuan,
                
                SUM(biaya) as biaya,
                keterangan, 
                DATE(created_at) as created',
            ) 
            ->where("no_lmt", $no_lmt)
            ->orderByDesc('created_at') 
            ->groupBy("no_lmt")
            ->first()
            ;
            $this->no_lmt = $data->no_lmt;
            $this->nama_pengirim = $data->nama_pengirim;
            $this->nama_penerima = $data->nama_penerima;
            $this->sopir = $data->sopir;
            $this->no_pol = $data->no_pol;
            $this->tujuan = $data->tujuan;
            $this->biaya = $data->biaya;
            $this->keterangan = $data->keterangan;
            $this->created = date_format(date_create($data->created, timezone_open("Asia/Jakarta")), 'd F Y');
        }  
    }
}
