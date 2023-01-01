<?php


namespace App\Http\Services\Voucher\DeactivateVoucher;


use App\Exceptions\SchematicsException;
use App\Models\Voucher;

class DeactivateVoucherService
{
    /**
     * @throws SchematicsException
     */
    public function execute(DeactivateVoucherRequest $request)
    {
        $voucher = Voucher::where('kode_voucher', $request->getKodeVoucher())->first();

        if (!$voucher) {
            throw new SchematicsException(
                config('error.msg.voucher-code-not-found'),
                config('error.code.voucher-code-not-found')
            );
        }

        $voucher->is_active = false;
        $voucher->save();
    }
}
