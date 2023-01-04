<?php

namespace App\Models\Cargo\Bus;


use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'wilayah';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_wilayah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
