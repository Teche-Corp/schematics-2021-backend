<?php


namespace App\Http\Services\Voucher\Communal\CreateCommunalVoucher;


use JsonSerializable;

class CreateCommunalVoucherResponse implements JsonSerializable
{
    public string $kode_voucher;

    /**
     * CreateVoucherResponse constructor.
     * @param string $kode_voucher
     */
    public function __construct(string $kode_voucher)
    {
        $this->kode_voucher = $kode_voucher;
    }

    public function jsonSerialize()
    {
        return [
            'kode_voucher' => $this->kode_voucher
        ];
    }
}
