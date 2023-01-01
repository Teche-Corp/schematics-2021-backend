<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAnggota extends Model
{
    use HasFactory;
    protected $table = "anggota_file";
    protected $fillable = [
        'anggota_id',
        'url',
    ];
    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
