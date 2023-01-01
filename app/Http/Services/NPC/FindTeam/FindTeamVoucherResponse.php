<?php


namespace App\Http\Services\NPC\FindTeam;


use JsonSerializable;

class FindTeamVoucherResponse implements JsonSerializable
{
	private string $kode_voucher;
	private float $potongan_persen;

	/**
	 * FindTeamVoucherResponse constructor.
	 * @param string $kode_voucher
	 * @param float $potongan_persen
	 */
	public function __construct(string $kode_voucher, float $potongan_persen)
	{
		$this->kode_voucher = $kode_voucher;
		$this->potongan_persen = $potongan_persen;
	}


	public function jsonSerialize(): array
	{
		return [
			'kode_voucher' => $this->kode_voucher,
			'potongan_persen' => $this->potongan_persen,
		];
	}
}