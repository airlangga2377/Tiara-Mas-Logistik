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
<<<<<<< HEAD
    protected $fillable = [ 
        'no_resi', 
        'no_lmt',  

        'code',
        'jumlah_barang',
        'jenis_barang', 
=======
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
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24

        'panjang', 
        'lebar', 
        'tinggi', 
        'berat', 

<<<<<<< HEAD
        'biaya', 
=======
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
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
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
<<<<<<< HEAD
    public function detailByNoLmT($no_lmt)
=======
    public function cargoDetailByNoLmT($no_lmt)
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
    {  
        if($no_lmt){ 
            $data = CargoPengirimanBarang::
            selectRaw(
<<<<<<< HEAD
                'SUM(biaya) as biaya, 
                DATE(created_at) as created',
            )
=======
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
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
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
<<<<<<< HEAD
            $this->biaya = $data->biaya; 
=======
            $this->biaya = $data->biaya;
            $this->keterangan = $data->keterangan;
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
            $this->created = date_format(date_create($data->created, timezone_open("Asia/Jakarta")), 'd F Y');
        }  
    }
}
