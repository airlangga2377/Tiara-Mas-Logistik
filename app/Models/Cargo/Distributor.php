<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'distributors';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_distributor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  
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
    public static function findName($name)
    { 
        return Distributor::class::where('name', $name)->first();
    }
}
