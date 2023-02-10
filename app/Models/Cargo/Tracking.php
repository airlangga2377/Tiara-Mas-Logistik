<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'trackings';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tracking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_lmt',  
        'id_message_tracking',  
        'id_message_status_pembayaran',  
        'id_status_pembayaran',  
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
}
