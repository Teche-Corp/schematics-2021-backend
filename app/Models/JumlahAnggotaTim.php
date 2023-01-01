<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class JumlahAnggotaTim extends SchematicsEnum
{
    //Jumlah Anggota disini tidak termasuk ketua sehingga dikurangi 1
    public const NLC = 1;
    public const NPC_JUNIOR = 1;
    public const NPC_SENIOR = 2;
    public const UPPER_LIMIT = 3;

    protected function onErrorException(): SchematicsException
    {
        return SchematicsException::build('invalid-enum');
    }
}
