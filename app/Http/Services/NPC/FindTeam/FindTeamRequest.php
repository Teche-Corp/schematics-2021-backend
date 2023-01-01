<?php


namespace App\Http\Services\NPC\FindTeam;


use App\Models\User;

class FindTeamRequest
{
    private int $team_id;
    private User $user;

    /**
     * FindTeamRequest constructor.
     * @param int $team_id
     * @param User $user
     */
    public function __construct(int $team_id, User $user)
    {
        $this->team_id = $team_id;
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->team_id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

}
