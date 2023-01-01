<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';
    protected $primaryKey = 'kode_voucher';
    protected $fillable = [
        'kode_voucher',
        'keterangan',
        'potongan_persen',
        'limit_jumlah',
        'tanggal_mulai',
        'tanggal_berakhir',
        'is_active'
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    public function buktiPembayaran(){
        return $this->hasMany(BuktiPembayaranTim::class, 'bukti_bayar_kode_voucher', 'kode_voucher');
    }

    public function teamsUsing()
    {
        return $this->hasManyThrough(Team::class, AppliedVoucher::class, 'kode_voucher', 'team_id', 'kode_voucher', 'team_id');
    }

    /**
     * Menentukan apakah kode voucher komunal
     * 
	 * @param string $code Voucher code
	 * @return bool
	 */
	public static function isCommunalVoucher(string $code)
	{
		return str_contains($code, VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND);
	}

    /**
	 * Fungsi untuk ambil data dari kode voucher komunal
	 * 
	 * @param string $code Kode voucher
	 * @return null|array
	 */
	public static function communalVoucherExplode(string $code)
	{
		if (Voucher::isCommunalVoucher($code)) {
			$code = explode(VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND, $code)[1]; // rest
			$voucher_data = explode('-', $code);

			if (sizeof($voucher_data) != 2) {
				return null;
			}

			$event = $voucher_data[0];
			$team_name = $voucher_data[1];

			switch ($event) {
				case 'NLC':
					$event_enum = TeamEventEnum::NLC;
					break;
				default:
                    $event_enum = null;
			}

			$team = Team::where('event', $event)
            			->Where('team_name', $team_name)
            			->first();

			return [
                'event' => [
                    'origin' => $event,
                    'enum' => $event_enum
                ],
                'team' => $team
            ];
		}

		return null;
	}

	/**
	 * Fungsi untuk ambil nama tim dari kode voucher komunal
	 * 
	 * @param string $code Kode voucher
	 * @return null|string
	 */
	public static function communalVoucherTeamName(string $code)
	{
		if (Voucher::isCommunalVoucher($code)) {
			$code = explode(VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND, $code)[1]; // rest
			$voucher_data = explode('-', $code);

			if (sizeof($voucher_data) < 2) {
				return null;
			}

			// $event = $voucher_data[0];
			// $team_name = $voucher_data[1];

			return $voucher_data[1];
		}

		return null;
	}

	public static function buildCommunalVoucherCode(string $team_name, bool $withRandomizer=false)
	{
        return $withRandomizer?
			VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND . "NLC-" . $team_name . strtoupper(Str::random(10))
				:
			VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND . "NLC-" . $team_name;
	}
}
