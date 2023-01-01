<?php

namespace App\Models\Cargo\Bus;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'area_bus';
    
    
    use Eloquence;

    protected $searchableColumns = ['kota'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['kota', 'alamat', 'kode_wilayah'];
    
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
