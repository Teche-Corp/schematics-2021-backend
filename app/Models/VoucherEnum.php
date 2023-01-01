<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class VoucherEnum extends SchematicsEnum
{
    # TODO voucher komunal awalannya apa?
    /** @var string */
    public const COMMUNAL_VOUCHER_CODE_APPEND = 'SCH-TEAM-';

    protected function onErrorException(): SchematicsException
    {
        throw new SchematicsException("Voucher tidak valid", 1015);
    }
}
