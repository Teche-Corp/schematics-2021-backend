<?php

namespace App\Http\Services\REEVA\CreateTicket;

use App\Models\User;

class CreateTicketRequest
{
    private User $user;

	/**
	 * CreateTicketRequest constructor.
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