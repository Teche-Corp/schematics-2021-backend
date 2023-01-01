<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'province_id',
        'region_id',
        'regency_name',
        'province_name',
        'region_name',
    ];

    public function teams() {
        return $this->hasMany(Team::class);
    }
}
