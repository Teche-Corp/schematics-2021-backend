<?php


namespace App\Http\Services\Voucher\ApplyVoucher;


use JsonSerializable;

class ApplyVoucherResponse implements JsonSerializable
{
	private string $kode_voucher;
	private float $potongan_persen;
	private int $time_used;

	/**
	 * ApplyVoucherResponse constructor.
	 * @param string $kode_voucher
	 * @param float $potongan_persen
	 * @param int $time_used
	 */
	public function __construct(string $kode_voucher, float $potongan_persen, int $time_used)
	{
		$this->kode_voucher = $kode_voucher;
		$this->potongan_persen = $potongan_persen;
		$this->time_used = $time_used;
	}

	public function jsonSerialize()
	{
		return [
			'kode_voucher' => $this->kode_voucher,
			'potongan_persen' => $this->potongan_persen,
			'telah_digunakan' => $this->time_used,
		];
	}
}