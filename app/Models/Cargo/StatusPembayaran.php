<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'status_pembayarans';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_status_pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pesan',   
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
}
