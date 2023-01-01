<?php


namespace App\Http\Controllers;


use App\Http\Services\ListAllRegions\ListAllRegionService;
use Illuminate\Http\JsonResponse;
use Throwable;

class RegionController extends Controller
{
    public function listAllRegion(): JsonResponse
    {
        /** @var ListAllRegionService $service */
        $service = resolve(ListAllRegionService::class);
        $response = $service->execute();

        return $this->successWithData($response);
    }
}
