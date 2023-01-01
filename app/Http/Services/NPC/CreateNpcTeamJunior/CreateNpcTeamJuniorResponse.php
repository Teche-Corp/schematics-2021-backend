<?php


namespace App\Http\Services\NPC\CreateNpcTeamJunior;


use JsonSerializable;

class CreateNpcTeamJuniorResponse implements JsonSerializable
{
	private int $team_id;

	/**
	 * CreateNpcTeamJuniorResponse constructor.
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