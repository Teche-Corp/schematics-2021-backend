<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class TahapanEnum extends SchematicsEnum
{
    public const PENYISIHAN = 'Penyisihan';
    public const PERDELAPAN_FINAL = 'Perdelapan Final';
    public const PEREMPAT_FINAL = 'Perempat Final';
    public const SEMIFINAL = 'Semifinal';
    public const FINAL = 'Final';

    /**
     * @throws SchematicsException
     */
    protected function onErrorException(): SchematicsException
    {
        throw new SchematicsException('invalid tahapan enum', 1030);
    }
}
