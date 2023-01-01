<?php

namespace App\Http\Services\AdminUpdateTeam;

use App\Models\TeamEventEnum;
use App\Models\Voucher;

class AdminUpdateTeamService
{
    public function execute(
        InputTeamRequest $team,
        InputAnggotaRequest $ketua,
        array $anggotas,
        InputPembayaranRequest $pembayaran,
    )
    {
        // TODO: validator

        $team->updateAll();
        // masukin ketua ke array anggota
        $anggotas[] = $ketua;
        foreach ($anggotas as $anggota) $anggota->updateAll();
        $pembayaran->updateAll();

        if (
            $team->getTeamModel()->event == TeamEventEnum::NLC &&
            ($communal_voucher = Voucher::where('kode_voucher', 'like', Voucher::buildCommunalVoucherCode($team->getTeamName()).'%')->first())
        ) {
            $communal_voucher->is_active = $pembayaran->isVerified();
            $communal_voucher->save();
        }

        return new AdminUpdateResponse(
            $team, $anggotas, $pembayaran
        );
    }
}
