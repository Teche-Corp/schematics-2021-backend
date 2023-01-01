<?php


namespace App\Http\Services\GetBuktiBayar;

use App\Exceptions\SchematicsException;
use App\Models\BuktiPembayaranTim;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GetBuktiBayarService
{
    public function execute(GetBuktiBayarRequest $request)
    {
        if ($request->getIdTim()) {
            $bukti_bayar = BuktiPembayaranTim::where('team_id', $request->getIdTim())->orderBy('created_at', 'DESC')->first();
            return new GetBuktiBayarResponse($bukti_bayar);
        }

        $user = Auth::user();
        if ($user->user_role != UserRole::ADMIN) {
            throw new SchematicsException('Forbidden', 403);
        }

        $bukti_bayar = BuktiPembayaranTim::paginate(50);

        return new GetBuktiBayarResponse($bukti_bayar);
    }
}
