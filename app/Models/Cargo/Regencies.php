<?php

namespace App\Models\Cargo;

use App\Models\Cargo\Bus\Wilayah;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'regencies';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_regencies';

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
    /**
     * Get the user that owns the Regency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
