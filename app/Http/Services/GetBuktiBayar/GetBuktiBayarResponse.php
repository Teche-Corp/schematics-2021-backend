<?php


namespace App\Http\Services\GetBuktiBayar;

use JsonSerializable;

class GetBuktiBayarResponse implements JsonSerializable
{
    private $queryResult;

    /**
     * UploadBuktiPembayaranResponse constructor.
     * @param string $url
     */
    public function __construct($queryResult)
    {
        $this->queryResult = $queryResult;
    }

    public function jsonSerialize()
    {
        return [
            'bukti_pembayaran' => $this->queryResult
        ];
    }

    /**
     * @return string
     */
    public function getQueryResult()
    {
        return $this->queryResult;
    }
}
