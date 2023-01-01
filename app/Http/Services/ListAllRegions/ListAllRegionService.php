<?php


namespace App\Http\Services\ListAllRegions;


use App\Models\Region;

class ListAllRegionService
{
    public function execute(): array
    {
        $regions = Region::all();

        $responses = [];

        foreach ($regions as $region){
            $responses[] = RegionResponse::create($region);
        }

        return $responses;
    }
}
