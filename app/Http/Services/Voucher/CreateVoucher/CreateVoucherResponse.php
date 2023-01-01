<?php


namespace App\Http\Services\Voucher\CreateVoucher;


use JsonSerializable;

class CreateVoucherResponse implements JsonSerializable
{
    public string $id;

    /**
     * CreateVoucherResponse constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id
        ];
    }
}
