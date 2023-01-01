<?php


namespace App\Http\Services\Voucher\ActivateVoucher;


use App\Models\User;

class ActivateVoucherRequest
{
	private string $kode_voucher;

	/**
	 * DisableVoucherRequest constructor.
	 * @param string $kode_voucher
	 * @param User $user
	 */
	public function __construct(string $kode_voucher)
	{
		$this->kode_voucher = $kode_voucher;
	}

	/**
	 * @return string
	 */
	public function getKodeVoucher(): string
	{
		return $this->kode_voucher;
	}
}
