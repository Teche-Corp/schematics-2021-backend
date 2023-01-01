<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaranTim extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayaran_tim';
    protected $fillable = [
        'team_id',
        'bukti_bayar_jumlah',
        'bukti_bayar_sumber',
        'bukti_bayar_kode_voucher',
        'bukti_bayar_url',
        'is_verified',
        'bukti_bayar_keterangan',
        'need_edit',
    ];

    public function team() {
        return $this->hasOne(Team::class,'team_id','team_id');
    }

    public function voucher(){
        return $this->hasOne(Voucher::class, 'kode_voucher', 'bukti_bayar_kode_voucher');
    }
}
