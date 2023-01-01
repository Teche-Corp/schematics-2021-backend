<?php

namespace App\Http\Services\Voucher\Communal\ListTeamUsingCommunalVoucher;

use App\Exceptions\SchematicsException;
use App\Models\Team;
use App\Models\TeamEventEnum;
use App\Models\Voucher;
use App\Models\VoucherEnum;

class ListTeamUsingCommunalVoucherService
{
    /**
     * ! Untuk tim sch nlc saja
     */
    public function execute(ListTeamUsingCommunalVoucherRequest $request)
    {
        $team = Team::where('ketua_id', $request->getUser()->id)->where('event', TeamEventEnum::NLC)->first();
        if (!$team) {
            throw SchematicsException::build("team-not-found");
        }

        $voucher_code = VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND . "NLC-" . $team->team_name;
        $voucher = Voucher::where('kode_voucher', 'LIKE', "{$voucher_code}%")->with('teamsUsing:applied_voucher.team_id,kota_id,ketua_id,team_name,team_institusi')->first();

        if (!$voucher) {
            throw SchematicsException::build('voucher-code-not-found');
        }

        return $voucher;
    }
}