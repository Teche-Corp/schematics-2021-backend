<?php


namespace App\Http\Services\GetUserInfo;


use JsonSerializable;

class GetUserInfoResponse implements JsonSerializable
{
	private int $id;
	private string $name;
	private string $email;
	private ?string $phone;
	private string $user_role;
	/** @var UserTeamResponse[] $team */
	private array $team;
	private ?UserNstTicketResponse $nst_ticket;
	private ?UserReevaTicketResponse $reeva_ticket;

	/**
	 * GetUserInfoResponse constructor.
	 * @param int $id
	 * @param string $name
	 * @param string $email
	 * @param string|null $phone
	 * @param string $user_role
	 * @param UserTeamResponse[] $team
	 */
	public function __construct(
		int $id,
		string $name,
		string $email,
		?string $phone,
		string $user_role,
		array $team,
		?UserNstTicketResponse $nst_ticket,
		?UserReevaTicketResponse $reeva_ticket
	) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
		$this->user_role = $user_role;
		$this->team = $team;
		$this->nst_ticket = $nst_ticket;
		$this->reeva_ticket = $reeva_ticket;
	}

	public function jsonSerialize(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
			'phone' => $this->phone,
			'user_role' => $this->user_role,
			'team' => $this->team,
			'nst_ticket' => $this->nst_ticket,
			'reeva_ticket' => $this->reeva_ticket,
		];
	}
}