<?php


namespace App\Http\Services\REEVA\GetNameData;


use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;

class GetNameDataService
{
    /**
     * @throws Exception
     */
    public function execute(GetNameDataRequest $request): array
    {
        $rows = DB::table('reeva_name')->paginate($request->getPerPage(), ['*'], 'page', $request->getPage());
        $response = [];
        foreach ($rows as $row) {
            $response[] = new GetNameDataResponse($row->id, $row->name, new DateTime($row->created_at));
        }
        return $response;
    }
}
