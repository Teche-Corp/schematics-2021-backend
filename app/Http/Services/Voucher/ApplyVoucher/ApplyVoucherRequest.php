<?php


namespace App\Http\Services\Voucher\ApplyVoucher;


use App\Models\User;

class ApplyVoucherRequest
{
	private string $kode_voucher;
	private int $team_id;
	private User $user;

	/**
	 * ApplyVoucherRequest constructor.
	 * @param string $kode_voucher
	 * @param int $team_id
	 * @param User $user
	 */
	public function __construct(string $kode_voucher, int $team_id, User $user)
	{
		$this->kode_voucher = $kode_voucher;
		$this->team_id = $team_id;
		$this->user = $user;
	}

	/**
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}

	/**
	 * @return string
	 */
	public function getKodeVoucher(): string
	{
		return $this->kode_voucher;
	}

	/**
	 * @return int
	 */
	public function getTeamId(): int
	{
		return $this->team_id;
	}

}