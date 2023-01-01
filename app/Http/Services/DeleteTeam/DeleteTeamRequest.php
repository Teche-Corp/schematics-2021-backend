<?php


namespace App\Http\Services\DeleteTeam;


class DeleteTeamRequest
{
	public int $team_id;

	/**
	 * DeleteTeamRequest constructor.
	 * @param int $team_id
	 */
	public function __construct(int $team_id)
	{
		$this->team_id = $team_id;
	}

	/**
	 * @return int
	 */
	public function getTeamId(): int
	{
		return $this->team_id;
	}
}