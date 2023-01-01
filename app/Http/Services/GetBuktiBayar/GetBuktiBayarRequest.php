<?php


namespace App\Http\Services\GetBuktiBayar;


class GetBuktiBayarRequest
{
    private $id_tim;

    public function __construct($id_tim)
    {
        $this->id_tim = $id_tim;
    }

    public function getIdTim()
    {
        return $this->id_tim;
    }
}
