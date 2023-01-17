<?php

namespace App\Models\Cargo\Bus;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'tujuan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tujuan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'wilayah_asal',
        'name'
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
