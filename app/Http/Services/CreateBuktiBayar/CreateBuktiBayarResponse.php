<?php


namespace App\Http\Services\CreateBuktiBayar;

use JsonSerializable;

class CreateBuktiBayarResponse implements JsonSerializable
{
    private $id;

    /**
     * CreateBuktiBayarResponse constructor.
     * @param string $url
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id
        ];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
