<?php


namespace App\Http\Services\NLC\FindTeam;

use App\Models\Voucher;
use JsonSerializable;

class FindTeamVoucherResponse implements JsonSerializable
{
	private string $kode_voucher;
	private float $potongan_persen;
	private int|null $limit_jumlah;
	private bool|null $is_active;

	/**
	 * FindTeamVoucherResponse constructor.
	 * @param string $kode_voucher
	 * @param float $potongan_persen
	 */
	public function __construct(string $kode_voucher, float $potongan_persen, int|null $limit_jumlah=null, bool|null $is_active=null)
	{
		$this->kode_voucher = $kode_voucher;
		$this->potongan_persen = $potongan_persen;
		$this->limit_jumlah = $limit_jumlah;
		$this->is_active = $is_active;
	}

	public function isCommunal(): bool
	{
		return Voucher::isCommunalVoucher($this->kode_voucher);
	}

	public function jsonSerialize(): array
	{
		if ($this->isCommunal()) {
			return [
				'kode_voucher' => $this->kode_voucher,
				'potongan_persen' => $this->potongan_persen,
				'limit_jumlah' => $this->limit_jumlah,
				'is_active' => $this->is_active,
			];
		}

		return [
			'kode_voucher' => $this->kode_voucher,
			'potongan_persen' => $this->potongan_persen,
		];
	}
}