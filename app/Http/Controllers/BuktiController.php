<?php


namespace App\Http\Controllers;

use App\Http\Services\CreateBuktiBayar\CreateBuktiBayarRequest;
use App\Http\Services\CreateBuktiBayar\CreateBuktiBayarService;
use App\Http\Services\GetBuktiBayar\GetBuktiBayarRequest;
use App\Http\Services\GetBuktiBayar\GetBuktiBayarService;
use App\Http\Services\UpdateBuktiBayar\UpdateBuktiBayarRequest;
use App\Http\Services\UpdateBuktiBayar\UpdateBuktiBayarService;
use App\Http\Services\VerifBuktiBayar\VerifBuktiBayarRequest;
use App\Http\Services\VerifBuktiBayar\VerifBuktiBayarService;
use App\Http\Services\Voucher\ApplyVoucher\ApplyVoucherRequest;
use App\Http\Services\Voucher\ApplyVoucher\ApplyVoucherService;
use App\Http\Services\Voucher\RevokeVoucher\RevokeVoucherRequest;
use App\Http\Services\Voucher\RevokeVoucher\RevokeVoucherService;
use App\Models\Mechanism\UnitOfWork;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuktiController extends Controller
{
    private UnitOfWork $unit_of_work;

    /**
     * BuktiController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

    public function insertBuktiPembayaran(Request $request): JsonResponse
    {
        $request->validate(
            [
                'jumlah' => 'required|numeric|min:0',
                'sumber' => 'required|max:10',
                'team_id' => 'required|exists:teams,team_id',
                'img' => 'required|image|max:2048'
            ]
        );

        $input = new CreateBuktiBayarRequest(
            $request->input('team_id'),
            $request->input('jumlah'),
            $request->input('sumber'),
            $request->file('img'),
            Auth::user()
        );

        /** @var CreateBuktiBayarService $service */
        $service = resolve(CreateBuktiBayarService::class);

        $this->unit_of_work->begin();
        $response = $service->execute($input);
        $this->unit_of_work->commit();

        return $this->successWithData($response);
    }

    public function updateBuktiPembayaran(Request $request): JsonResponse
    {
        $request->validate(
            [
                'bukti_bayar_id' => 'required',
                'jumlah' => 'required|numeric|min:0',
                'sumber' => 'required|max:10',
                'url_bukti' => 'required|max:255',
            ]
        );

        $input = new UpdateBuktiBayarRequest(
            $request->input('bukti_bayar_id'),
            $request->input('jumlah'),
            $request->input('sumber'),
            $request->input('url_bukti'),
        );

        /** @var UpdateBuktiBayarService $service */
        $service = resolve(UpdateBuktiBayarService::class);

        $this->unit_of_work->begin();
        $service->execute($input);
        $this->unit_of_work->commit();

        return $this->success();
    }

    public function verifBuktiPembayaran(Request $request): JsonResponse
    {
        $request->validate(
            [
                'bukti_bayar_id' => 'required',
                'is_verified' => 'required|boolean',
                'keterangan' => 'nullable|max:255',
                'butuh_edit' => 'required_if:is_verified,false|boolean',
            ]
        );

        $input = new VerifBuktiBayarRequest(
            $request->input('bukti_bayar_id'),
            $request->input('is_verified'),
            $request->input('keterangan'),
            $request->input('butuh_edit'),
        );

        /** @var VerifBuktiBayarService $service */
        $service = resolve(VerifBuktiBayarService::class);

        $this->unit_of_work->begin();
        $service->execute($input);
        $this->unit_of_work->commit();

        return $this->success();
    }

    public function getBuktiPembayaran(Request $request): JsonResponse
    {
        $request->validate(
            [
                'id' => 'nullable|exists:bukti_pembayaran_tim,team_id',
            ]
        );

        /** @var GetBuktiBayarRequest $input */
        $input = new GetBuktiBayarRequest(
            $request->input('id_tim'),
        );

        /** @var GetBuktiBayarService $service */
        $service = resolve(GetBuktiBayarService::class);
        $response = $service->execute($input);

        return $this->successWithData($response);
    }

    public function applyVoucher(Request $request): JsonResponse
    {
        $request->validate(
            [
                'team_id' => 'required|exists:teams,team_id',
                'kode_voucher' => 'required|max:255',
            ]
        );

        $input = new ApplyVoucherRequest(
            $request->input('kode_voucher'),
            $request->input('team_id'),
            Auth::user()
        );

        /** @var ApplyVoucherService $service */
        $service = resolve(ApplyVoucherService::class);

        $this->unit_of_work->begin();
        $response = $service->execute($input);
        $this->unit_of_work->commit();

        return $this->successWithData($response);
    }

    public function revokeVoucher(Request $request, $event): JsonResponse
    {
        $request->validate(
            [
                'kode_voucher' => 'required|max:255',
            ]
        );

        $input = new RevokeVoucherRequest(
            $event,
            Auth::user(),
            $request->input('kode_voucher')
        );

        /** @var RevokeVoucherService $service */
        $service = resolve(RevokeVoucherService::class);
        $response = $service->execute($input);

        return $this->success();
    }
}
