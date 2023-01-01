<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedVoucher extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'applied_voucher';

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'team_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'kode_voucher', 'kode_voucher');
    }
}
