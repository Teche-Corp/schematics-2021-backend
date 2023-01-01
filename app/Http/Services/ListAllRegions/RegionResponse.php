<?php


namespace App\Http\Services\ListAllRegions;


use App\Models\Region;
use JsonSerializable;

class RegionResponse implements JsonSerializable
{
    private int $id;
    private int $province_id;
    private int $region_id;
    private string $regency_name;
    private string $province_name;
    private string $region_name;

    /**
     * RegionResponse constructor.
     * @param int $id
     * @param int $province_id
     * @param int $region_id
     * @param string $regency_name
     * @param string $province_name
     * @param string $region_name
     */
    public function __construct(
        int $id,
        int $province_id,
        int $region_id,
        string $regency_name,
        string $province_name,
        string $region_name
    ) {
        $this->id = $id;
        $this->province_id = $province_id;
        $this->region_id = $region_id;
        $this->regency_name = $regency_name;
        $this->province_name = $province_name;
        $this->region_name = $region_name;
    }

    public static function create (Region $region): RegionResponse
    {
        return new self(
            $region->id,
            $region->province_id,
            $region->region_id,
            $region->regency_name,
            $region->province_name,
            $region->region_name,
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'province_id' => $this->province_id,
            'region_id' => $this->region_id,
            'regency_name' => $this->regency_name,
            'province_name' => $this->province_name,
            'region_name' => $this->region_name,
        ];
    }
}
