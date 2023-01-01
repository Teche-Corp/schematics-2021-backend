<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class EventPriceEnum extends SchematicsEnum
{
    public const NLC = 100000;
    public const NPC_JUNIOR = 50000;
    public const NPC_SENIOR = 120000;

    protected function onErrorException(): SchematicsException
    {
        throw new SchematicsException("Event Invalid", 1016);
    }
}
