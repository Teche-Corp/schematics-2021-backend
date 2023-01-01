<?php


namespace App\Http\Services\Voucher\ApplyVoucher;


use App\Exceptions\SchematicsException;
use App\Models\Team;
use App\Models\TeamEventEnum;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApplyVoucherService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(ApplyVoucherRequest $request): ApplyVoucherResponse
	{
		$user_team = $request->getUser()->anggota()
			->where('team_id', $request->getTeamId())
			->exists();

		if (!$user_team) {
			throw SchematicsException::build('access-denied');
		}

		$team = Team::where('team_id', $request->getTeamId())->first();

		if (!$team) {
			throw SchematicsException::build('team-not-found');
		}

		if ($team->event != TeamEventEnum::NLC) {
			throw new SchematicsException("Voucher hanya untuk tim Schematics NLC", 1001);
		}

		//cek tanggalnya sudah lewat atau belum
		$current_date = Carbon::now('Asia/Jakarta')->getTimestamp();
		$config_date = Carbon::createFromFormat(
			'd/m/Y',
			config('event-dates.' . 'nlc_voucher_closing' . '.date'),
			'Asia/Jakarta'
		)->startOfDay()->getTimestamp();
		if ($current_date > $config_date) {
			throw SchematicsException::build('invalid-voucher-apply-date');
		}

		$team_has_uploaded_bukti_pembayaran = $team->buktiPembayaran;

		if ($team_has_uploaded_bukti_pembayaran) {
			throw SchematicsException::build('team-has-uploaded-bukti-bayar');
		}

		$team_has_applied_any_voucher = DB::table('applied_voucher')
			->where('team_id', $request->getTeamId())
			->exists();

		if ($team_has_applied_any_voucher) {
			throw SchematicsException::build('team-has-applied-voucher');
		}

		$voucher = Voucher::where('kode_voucher', $request->getKodeVoucher())->first();
		$is_communal = Voucher::isCommunalVoucher($request->getKodeVoucher());
		$communal_voucher_owner = ($team->team_name == Voucher::communalVoucherTeamName($request->getKodeVoucher()));

		if (!$voucher || (!$voucher->is_active && !$is_communal)) {
			throw SchematicsException::build('voucher-code-not-found');
		} else {
			if (!$voucher->is_active && $is_communal) {
				throw new SchematicsException("Voucher komunal ini belum diverifikasi oleh admin", 1001);
			}
		}

		$time_used = DB::table('applied_voucher')
			->where('kode_voucher', $request->getKodeVoucher())
			->count('kode_voucher');

		if ($is_communal && !$communal_voucher_owner) {
			$time_used++;
		} # Owner selalu disediakan slot

		if ($time_used >= $voucher->limit_jumlah) {
			throw SchematicsException::build('voucher-limit-reached');
		}

		$current_date = new Carbon();
		$start_date = Carbon::parse($voucher->tanggal_mulai);
		$end_date = Carbon::parse($voucher->tanggal_berakhir);
		if (!$current_date->isBetween($start_date, $end_date)) {
			throw SchematicsException::build('invalid-voucher-apply-date');
		}

		$this->applyVoucher($voucher, $request->getTeamId());

		/**
		 * Kalau voucher komunal, time used dipakai untuk menentukan
		 * potongan harganya di frontend.
		 *
		 * Kalau bukan komunal, nggak diberitahu voucher sudah
		 * dipakai berapa kali.
		 *
		 */
		return new ApplyVoucherResponse(
			$voucher->kode_voucher,
			$voucher->potongan_persen,
			$is_communal ? $time_used : -1
		);
	}

	private function applyVoucher(Voucher $voucher, int $team_id)
	{
		DB::table('applied_voucher')
			->insert(
				[
					'team_id' => $team_id,
					'kode_voucher' => (string)$voucher->kode_voucher
				]
			);
	}
}