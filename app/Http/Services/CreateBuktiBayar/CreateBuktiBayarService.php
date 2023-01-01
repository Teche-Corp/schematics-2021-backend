<?php


namespace App\Http\Services\CreateBuktiBayar;

use App\Exceptions\SchematicsException;
use App\Models\BuktiPembayaranTim;
use App\Models\EventPriceEnum;
use App\Models\Team;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateBuktiBayarService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(CreateBuktiBayarRequest $request)
	{
		$team = Team::where('team_id', $request->getTeamId())->first();

		if ($team->ketua_id != $request->getUser()->id) {
			throw SchematicsException::build('no-access-to-team');
		}

		if ($team->buktiPembayaran()->exists()) {
			throw SchematicsException::build('have-paid');
		}

		//validasi tanggalnya
		$this->validateDate($team);

		$price = null;
		switch ($team->event) {
			case 'nlc':
				$price = EventPriceEnum::NLC;
				break;
			case 'npc_junior':
				$price = EventPriceEnum::NPC_JUNIOR;
				break;
			case 'npc_senior':
				$price = EventPriceEnum::NPC_SENIOR;
				break;
			default:
				throw new SchematicsException("Event tidak valid", 1001);
		}

		$img = $request->getImg();
		$imgExtension = $img->guessExtension();
		$filename = 'bukti-bayar.' . Str::random(32) . '.' . Str::uuid()->toString(
			) . (($imgExtension == '') ? '' : '.' . $imgExtension);
		$saveStatus = Storage::disk('public')->put('bukti_pembayaran/' . $filename, file_get_contents($img));

		if (!$saveStatus) {
			throw SchematicsException::build("failed-to-save-file");
		}

		$applied_voucher = DB::table('applied_voucher')
			->where('team_id', $request->getTeamId())
			->first();

		$voucher = null;
		if ($applied_voucher) {
			$voucher = Voucher::where('kode_voucher', $applied_voucher->kode_voucher)->first();
		}

		if (!$voucher && $team->event == 'nlc') {
			$voucher = Voucher::where('kode_voucher', 'like', Voucher::buildCommunalVoucherCode($team->team_name).'%')->first();
		}

		if ($voucher && $team->event == 'nlc') {
			if (Voucher::isCommunalVoucher($voucher->kode_voucher) && !$voucher->is_active) {
				if (Voucher::communalVoucherTeamName($voucher->kode_voucher) != $team->team_name) {
					throw new SchematicsException(
						"Hanya pemilik voucher komunal yang dapat melakukan pembayaran", 1001
					);
				}

				# Harga ikut figmanya wisnu
				switch ($voucher->limit_jumlah) {
					case 3:
						$price = 285000;
						break;
					case 4:
						$price = 380000;
						break;
					case 5:
						$price = 450000;
						break;
					case 6:
						$price = 540000;
						break;
					default:
						throw new SchematicsException("Limit jumlah di voucher komunal tidak sesuai", 1001);
				}
			} else {
				$price *= (100 - $voucher->potongan_persen) / 100;
			}
		}

		$bukti_bayar = new BuktiPembayaranTim();
		$bukti_bayar->team_id = $request->getTeamId();
		$bukti_bayar->bukti_bayar_jumlah = $price;
		$bukti_bayar->bukti_bayar_sumber = $request->getSumber();
		$bukti_bayar->bukti_bayar_kode_voucher = $applied_voucher ? $applied_voucher->kode_voucher : null;
		$bukti_bayar->bukti_bayar_url = Storage::disk('public')->url('bukti_pembayaran/' . $filename);
		$bukti_bayar->save();

		Team::where('team_id', $request->getTeamId())
			->update(['bukti_bayar_id' => $bukti_bayar->id]);

		return new CreateBuktiBayarResponse($bukti_bayar->id);
	}

	/**
	 * @throws SchematicsException
	 */
	private function validateDate($team)
	{
		$current_date = Carbon::now('Asia/Jakarta')->getTimestamp();

		switch ($team->event) {
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
