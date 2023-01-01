<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use App\Models\Cargo\Bus\Wilayah;
use AzisHapidin\IndoRegion\Traits\RegencyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Regency Model.
 */
class Regency extends Model
{
    use RegencyTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'regencies';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'province_id'
    ];
    /**
     * Regency belongs to Province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Regency has many districts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}