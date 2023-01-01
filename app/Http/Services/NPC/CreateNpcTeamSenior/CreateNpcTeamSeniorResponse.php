<?php


namespace App\Http\Services\NPC\CreateNpcTeamSenior;

use JsonSerializable;

class CreateNpcTeamSeniorResponse implements JsonSerializable
{
	private int $team_id;

	/**
	 * CreateNpcTeamSeniorResponse constructor.
	 * @param int $team_id
	 */
	public function __construct(int $team_id)
	{
		$this->team_id = $team_id;
	}

	public function jsonSerialize(): array
	{
		return [
			'team_id' => $this->team_id
		];
	}
}