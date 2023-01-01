<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reeva extends Model
{
    use HasFactory;

    protected $table = 'reeva';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
}
