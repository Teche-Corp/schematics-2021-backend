<?php


namespace App\Http\Services\UploadBuktiPembayaran;

use JsonSerializable;

class UploadBuktiPembayaranResponse implements JsonSerializable
{
    private string $url;

    /**
     * UploadBuktiPembayaranResponse constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function jsonSerialize()
    {
        return [
            'url' => $this->url
        ];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
