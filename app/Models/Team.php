<?php

namespace App\Models;

use App\Exceptions\SchematicsException;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, Compoships;

    protected $table = 'teams';
    protected $primaryKey = 'team_id';
    protected $fillable = [
        //int
        'kota_id',
        'ketua_id',
        'status_id',
        'tahapan_id',
        'bukti_bayar_id',
        // string
        'team_name',
        'event',
        'team_password',
        'team_institusi'
    ];

    public function kota()
    {
        return $this->belongsTo(Region::class);
    }

    public function buktiPembayaran()
    {
        return $this->hasOne(BuktiPembayaranTim::class, 'team_id', 'team_id');
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'team_id', 'team_id');
    }

    public function userKetua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }

    public function anggotaKetua()
    {
        return $this->hasOne(Anggota::class, ['team_id', 'user_id'], ['team_id', 'ketua_id']);
    }

    public function communalVoucherCode()
    {
        if ($this->event != TeamEventEnum::NLC) {
            throw new SchematicsException("Tidak dapat menggunakan voucher komunal", 1001);
        }

        if (!$this->team_name) {
            throw new SchematicsException("Nama tim tidak boleh kosong", 1001);
        }

        return VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND . 'NLC-' . $this->team_name;
    }

    // next: penilaian team (?)
}
