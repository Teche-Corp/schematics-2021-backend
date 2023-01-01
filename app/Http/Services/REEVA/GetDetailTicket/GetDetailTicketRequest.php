<?php

namespace App\Http\Services\REEVA\GetDetailTicket;

use App\Models\User;

class GetDetailTicketRequest
{
    private User $user;

	/**
	 * GetDetailTicketRequest constructor.
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}
}