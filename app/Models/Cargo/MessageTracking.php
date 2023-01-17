<?php

namespace App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;

class MessageTracking extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'message_trackings';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_message_tracking';

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
