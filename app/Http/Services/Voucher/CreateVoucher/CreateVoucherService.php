<?php


namespace App\Http\Services\Voucher\CreateVoucher;


use App\Exceptions\SchematicsException;
use App\Models\UserRole;
use App\Models\Voucher;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Support\Facades\Validator;

class CreateVoucherService
{
    /**
     * @throws SchematicsException
     */
    public function execute(CreateVoucherRequest $request)
    {
        $voucher = Voucher::where('kode_voucher', $request->getKodeVoucher())->first();

        if ($voucher) {
            throw new SchematicsException(
                config('error.msg.duplicate-voucher-code'),
                config('error.code.duplicate-voucher-code')
            );
        }
        
        $tanggal_mulai = (new Carbon($request->getTanggalMulai()))->startOfDay()->subHours(7);
        $tanggal_berakhir = (new Carbon($request->getTanggalBerakhir()))->endOfDay()->subHours(7);
        if ($tanggal_mulai->getTimestamp() >= $tanggal_berakhir->getTimestamp()) {
            throw new SchematicsException(
                config('error.msg.end-date-before-start-date'),
                config('error.code.end-date-before-start-date')
            );
        }


        $voucher = Voucher::create(
            [
                'kode_voucher' => $request->getKodeVoucher(),
                'keterangan' => $request->getKeterangan(),
                'potongan_persen' => $request->getPotonganPersen(),
                'limit_jumlah' => $request->getLimitJumlah(),
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_berakhir' => $tanggal_berakhir,
                'is_active' => $request->isIsActive()
            ]
        );

        return new CreateVoucherResponse(
            $voucher->kode_voucher
        );
    }
}
