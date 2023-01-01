<?php

namespace App\Http\Services\AdminDetailTeam;

use JsonSerializable;

class AdminDetailKotaResponse implements JsonSerializable
{
    private int $kota_id;
    private int $province_id;
    private string $regency_name;
    private string $province_name;
    private string $region_id;
    private string $region_name;

    public function __construct(
        int $kota_id,
        int $province_id,
        string $regency_name,
        string $province_name,
        string $region_id,
        string $region_name)
    {
        $this->kota_id = $kota_id;
        $this->province_id = $province_id;
        $this->regency_name = $regency_name;
        $this->province_name = $province_name;
        $this->region_id = $region_id;
        $this->region_name = $region_name;
    }

    public function jsonSerialize()
    {
        return [
            "kota_id" => $this->kota_id,
            "province_id" => $this->province_id,
            "regency_name" => $this->regency_name,
            "province_name" => $this->province_name,
            "region_id" => $this->region_id,
            "region_name" => $this->region_name
        ];
    }
}
