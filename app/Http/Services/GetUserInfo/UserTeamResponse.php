<?php


namespace App\Http\Services\GetUserInfo;


use JsonSerializable;

class UserTeamResponse implements JsonSerializable
{
    private int $team_id;
    private ?string $event;

    /**
     * UserTeamResponse constructor.
     * @param int $team_id
     * @param string|null $event
     */
    public function __construct(int $team_id, ?string $event)
    {
        $this->team_id = $team_id;
        $this->event = $event;
    }

    public function jsonSerialize(): array
    {
        return [
            "team_id" => $this->team_id,
            "event" => $this->event
        ];
    }
}
