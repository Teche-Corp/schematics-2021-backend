<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory, Compoships;

    protected $table = 'anggota';
    protected $primaryKey = 'anggota_id';
    protected $fillable = [
        'team_id',
        'user_id',
        'anggota_nisn',
        'anggota_alamat',
        'anggota_id_line',
        'anggota_id_facebook'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id','team_id');
    }

    public function file()
    {
        return $this->hasOne(FileAnggota::class, 'anggota_id');
    }
}
