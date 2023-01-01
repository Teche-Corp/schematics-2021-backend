<?php


namespace App\Http\Services\Voucher\ActivateVoucher;


use App\Exceptions\SchematicsException;
use App\Models\Voucher;

class ActivateVoucherService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(ActivateVoucherRequest $request)
	{
		$voucher = Voucher::where('kode_voucher', $request->getKodeVoucher())->first();

		if (!$voucher) {
			throw new SchematicsException(
				config('error.msg.voucher-code-not-found'),
				config('error.code.voucher-code-not-found')
			);
		}

		$voucher->is_active = true;
		$voucher->save();
	}
}
