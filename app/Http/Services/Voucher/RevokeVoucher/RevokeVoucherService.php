<?php

namespace App\Http\Services\Voucher\RevokeVoucher;

use App\Exceptions\SchematicsException;
use App\Models\AppliedVoucher;
use App\Models\Team;

class RevokeVoucherService
{
    public function execute(RevokeVoucherRequest $request)
    {
        $team = Team::where('ketua_id', $request->getUser()->id)
                    ->where('event', $request->getEventEnum())
                    ->with('buktiPembayaran:team_id')
                    ->first();

        if (!$team) {
            throw SchematicsException::build("team-not-found");
        }

        if ($team->buktiPembayaran) {
            throw SchematicsException::build("have-paid");
        }

        $applied_voucher = AppliedVoucher::where('team_id', $team->team_id)
                                         ->where('kode_voucher', $request->getKodeVoucher())
                                         ->delete();
    }
}