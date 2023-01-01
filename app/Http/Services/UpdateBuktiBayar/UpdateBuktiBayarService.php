<?php


namespace App\Http\Services\UpdateBuktiBayar;


use App\Exceptions\SchematicsException;
use App\Models\BuktiPembayaranTim;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateBuktiBayarService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(UpdateBuktiBayarRequest $request): bool
	{
		$bukti_bayar = BuktiPembayaranTim::find($request->getBuktiBayarId());

		if (!$bukti_bayar) {
			throw new SchematicsException("Bukti pembayaran tidak ditemukan", 1); // TODO masukkan ke config error
		}

		if ($bukti_bayar->is_verfied) {
			throw SchematicsException::build('payment-verified');
		}

		if (!$bukti_bayar->need_edit) {
			throw new SchematicsException("Bukti pembayaran tidak boleh diubah", 1); // TODO masukkan ke config error
		}

		//validasi tanggalnya
		$this->validateDate($bukti_bayar);

		$applied_voucher = DB::table('applied_voucher')
			->where('team_id', $bukti_bayar->team->team_id)
			->first();

		$bukti_bayar->need_edit = false;
		$bukti_bayar->bukti_bayar_jumlah = $request->getJumlah();
		$bukti_bayar->bukti_bayar_sumber = $request->getSumber();
		$bukti_bayar->bukti_bayar_kode_voucher = $applied_voucher ? $applied_voucher->kode_voucher : null;
		$bukti_bayar->bukti_bayar_url = $request->getUrlBukti();
		$bukti_bayar->save();

		return true;
	}

	/**
	 * @throws SchematicsException
	 */
	private function validateDate($bukti_bayar)
	{
		$current_date = Carbon::now('Asia/Jakarta')->getTimestamp();

		$tim = $bukti_bayar->team;
		switch ($tim->event) {
			case 'nlc' :
				$config_date = Carbon::createFromFormat(
					'd/m/Y',
					config('event-dates.' . 'nlc_voucher_closing' . '.date'),
					'Asia/Jakarta'
				)->startOfDay()->getTimestamp();
				break;
			case 'npc_junior' :
			case 'npc_senior' :
				$config_date = Carbon::createFromFormat(
					'd/m/Y',
					config('event-dates.' . 'npc_voucher_closing' . '.date'),
					'Asia/Jakarta'
				)
					->startOfDay()
					->getTimestamp();
				break;
			default :
				$config_date = 0;
		}


		if ($current_date > $config_date) {
			throw SchematicsException::build('payment-closed');
		}
	}
}
