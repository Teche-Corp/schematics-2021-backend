<?php


namespace App\Http\Services\Voucher\Communal\CreateCommunalVoucher;


use App\Exceptions\SchematicsException;
use App\Models\Team;
use App\Models\TeamEventEnum;
use App\Models\Voucher;
use App\Models\VoucherEnum;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CreateCommunalVoucherService
{
    /**
     * @throws SchematicsException
     */
    public function execute(CreateCommunalVoucherRequest $request)
    {
        $team = Team::where('ketua_id', $request->getUser()->id)->where('event', TeamEventEnum::NLC)->first();
        if (!$team) {
            throw SchematicsException::build("team-not-found");
        }

        $voucher_code = VoucherEnum::COMMUNAL_VOUCHER_CODE_APPEND . "NLC-" . $team->team_name;
        $voucher = Voucher::where('kode_voucher', 'like', "{$voucher_code}%")->first();
        
        if ($voucher) {
            throw new SchematicsException(
                config('error.msg.duplicate-voucher-code'),
                config('error.code.duplicate-voucher-code')
            );
        }
        $voucher_code = $voucher_code. '-' . strtoupper(Str::random(10));

        $tanggal_mulai = Carbon::now()->startOfDay()->subHours(7);
        $tanggal_berakhir = Carbon::now()->addDays(7)->endOfDay()->subHours(7);

        $voucher = Voucher::create(
            [
                'kode_voucher' => $voucher_code,
                'keterangan' => "Voucher untuk tim Schematics NLC " . $team->team_name . ".",
                'potongan_persen' => 100,
                'limit_jumlah' => $request->getJumlahTim(),
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_berakhir' => $tanggal_berakhir,
                'is_active' => false
            ]
        );

        return new CreateCommunalVoucherResponse(
            $voucher->kode_voucher
        );
    }
}
