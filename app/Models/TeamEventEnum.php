<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class TeamEventEnum extends SchematicsEnum
{
    public const NLC = 'nlc';
    public const NPC_JUNIOR = 'npc_junior';
    public const NPC_SENIOR = 'npc_senior';

    protected function onErrorException(): SchematicsException
    {
        throw new SchematicsException("Team Event Invalid", 1015);
    }
}
