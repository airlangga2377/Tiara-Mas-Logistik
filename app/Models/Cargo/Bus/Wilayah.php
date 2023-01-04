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
        'name',
        'alamat',
        'kode_wilayah' 
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
