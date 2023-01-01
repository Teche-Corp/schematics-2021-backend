<?php


namespace App\Http\Services\VerifBuktiBayar;


use App\Exceptions\SchematicsException;
use App\Models\BuktiPembayaranTim;
use Illuminate\Support\Facades\Validator;

class VerifBuktiBayarService
{
    public function execute(VerifBuktiBayarRequest $request)
    {
        $bukti_bayar = BuktiPembayaranTim::find($request->getBuktiBayarId());

        if (!$bukti_bayar) {
            throw new SchematicsException("Bukti pembayaran tidak ditemukan", 1); // TODO masukkan ke config error
        }

        $bukti_bayar->is_verified = $request->getIsVerified();
        $bukti_bayar->keterangan = $request->getKeterangan();
        $bukti_bayar->need_edit = $request->getNeedEdit();
        $bukti_bayar->save();

        return true;
    }
}
