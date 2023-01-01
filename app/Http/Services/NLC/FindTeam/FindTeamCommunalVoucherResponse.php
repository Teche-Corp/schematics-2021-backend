<?php


namespace App\Http\Services\NLC\FindTeam;

use JsonSerializable;

class FindTeamCommunalVoucherResponse implements JsonSerializable
{
	private string $kode_voucher;
	private float $potongan_persen;
	private int $limit_jumlah;
	private bool $is_active;
	private string $tanggal_berakhir;

	/**
	 * FindTeamVoucherResponse constructor.
	 * @param string $kode_voucher
	 * @param float $potongan_persen
	 */
	public function __construct(string $kode_voucher, float $potongan_persen, int $limit_jumlah=0, bool $is_active=false, string $tanggal_berakhir)
	{
		$this->kode_voucher = $kode_voucher;
		$this->potongan_persen = $potongan_persen;
		$this->limit_jumlah = $limit_jumlah;
		$this->is_active = $is_active;
		$this->tanggal_berakhir = $tanggal_berakhir;
	}

	public function jsonSerialize(): array
	{
        return [
            'kode_voucher' => $this->kode_voucher,
            'potongan_persen' => $this->potongan_persen,
            'limit_jumlah' => $this->limit_jumlah,
            'is_active' => $this->is_active,
            'tanggal_berakhir' => $this->tanggal_berakhir,
        ];
	}
}