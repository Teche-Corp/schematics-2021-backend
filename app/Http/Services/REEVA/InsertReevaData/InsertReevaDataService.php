<?php


namespace App\Http\Services\REEVA\InsertReevaData;


use DateTime;
use Illuminate\Support\Facades\DB;

class InsertReevaDataService
{
    public function execute(InsertReevaDataRequest $request)
    {
        DB::table('reeva_name')->insert([
            'name' => $request->getName(),
            'created_at' => new DateTime()
        ]);
    }
}
