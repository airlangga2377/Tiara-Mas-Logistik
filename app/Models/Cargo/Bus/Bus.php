<?php

namespace App\Models\Cargo\Bus;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'bus';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_bus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_pol',  
        'sopir_utama',  
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
     * Get by Name.
    */ 
    public static function findSopir($name)
    { 
        return Bus::class::where('sopir_utama', $name)->first();
    }

    /**
     * Get by Name.
    */ 
    public static function cariNoPol($id)
    { 
        return Bus::class::find($id);
    }
}
