<?php

namespace App\Http\Services\GetStatisticFromTable;

use App\Models\EventStatistic;
use Illuminate\Support\Facades\DB;

class GetStatisticFromTableService
{
    public function execute(GetStatisticFromTableRequest $request)
    {
        $row_needed = '';

        if ($request->getTotalPendaftaran()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendaftaran';
        }

        if ($request->getTotalPendapatan()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan';
        }

        if ($request->getTotalTimNlcSudahBayar()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_nlc_sudah_bayar';
        }

        if ($request->getTotalTimNlc()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_nlc';
        }

        if ($request->getTotalTimNpcJuniorSudahBayar()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_npc_junior_sudah_bayar';
        }

        if ($request->getTotalTimNpcSeniorSudahBayar()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_npc_senior_sudah_bayar';
        }

        if ($request->getTotalTimNpcJunior()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_npc_junior';
        }

        if ($request->getTotalTimNpcSenior()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tim_npc_senior';
        }

        if ($request->getTotalTiketNstSudahBayar()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tiket_nst_sudah_bayar';
        }

        if ($request->getTotalTiketNst()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tiket_nst';
        }

        if ($request->getTotalTiketReevaSudahBayar()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tiket_reeva_sudah_bayar';
        }

        if ($request->getTotalTiketReeva()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_tiket_reeva';
        }

        if ($request->getTotalPendapatanNlc()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan_nlc';
        }

        if ($request->getTotalPendapatanNpcJunior()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan_npc_junior';
        }

        if ($request->getTotalPendapatanNpcSenior()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan_npc_senior';
        }

        if ($request->getTotalPendapatanNst()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan_nst';
        }

        if ($request->getTotalPendapatanReeva()) {
            if (strlen($row_needed) > 0) {
                $row_needed .= ',';
            }

            $row_needed .= 'total_pendapatan_reeva';
        }

        if (strlen($row_needed) == 0) {
            $row_needed = 'total_pendaftaran,total_pendapatan';
        }

        return EventStatistic::select(DB::raw($row_needed))->first();
    }
}