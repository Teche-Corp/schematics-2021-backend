<?php


namespace App\Http\Services\GetUserInfo;


class GetUserInfoService
{
	public function execute(GetUserInfoRequest $request)
	{
		$user = $request->getUser();

		/** @var UserTeamResponse[] $team */
		$team = [];

		foreach ($user->anggota as $anggota) {
			$team[] = new UserTeamResponse(
				$anggota->team_id,
				($anggota->team) ? $anggota->team->event : null,
			);
		}

		$ticket_response = null;
		$ticket = $user->nstTicket;
		if ($ticket) {
			$ticket_response = new UserNstTicketResponse(
				$ticket->id,
				$ticket->user_id,
				$ticket->created_at,
			);
		}

		$ticket_reeva_response = null;
		$ticket_reeva = $user->reevaTicket;
		if ($ticket_reeva) {
			$ticket_reeva_response = new UserReevaTicketResponse(
				$ticket_reeva->id,
				$ticket_reeva->user_id,
				$ticket_reeva->created_at,
			);
		}

		return new GetUserInfoResponse(
			$user->id,
			$user->name,
			$user->email,
			$user->phone,
			$user->user_role,
			$team,
			$ticket_response,
			$ticket_reeva_response,
		);
	}
}
