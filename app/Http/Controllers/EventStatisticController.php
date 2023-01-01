<?php

namespace App\Http\Controllers;

use App\Http\Services\GetStatisticFromTable\GetStatisticFromTableRequest;
use App\Http\Services\GetStatisticFromTable\GetStatisticFromTableService;
use Illuminate\Http\Request;

class EventStatisticController extends Controller
{
    public function getFromStatisticTable(Request $request)
    {
        /** @var GetStatisticFromTableRequest */
        $request = new GetStatisticFromTableRequest(
            $request->input('total_daftar'),
            $request->input('total_pendapatan'),
            $request->input('nlc_sudah_bayar'),
            $request->input('total_tim_nlc'),
            $request->input('npcj_sudah_bayar'),
            $request->input('npcs_sudah_bayar'),
            $request->input('total_tim_npcj'),
            $request->input('total_tim_npcs'),
            $request->input('total_tiket_nst_sudah_bayar'),
            $request->input('total_tiket_nst'),
            $request->input('total_tiket_reeva_sudah_bayar'),
            $request->input('total_tiket_reeva'),
            $request->input('total_pendapatan_nlc'),
            $request->input('total_pendapatan_npcj'),
            $request->input('total_pendapatan_npcs'),
            $request->input('total_pendapatan_nst'),
            $request->input('total_pendapatan_reeva'),

        );

        $service = resolve(GetStatisticFromTableService::class);
        $response = $service->execute($request);

        return $this->successWithData($response);
    }
}
