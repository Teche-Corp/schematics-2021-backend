<?php

namespace App\Http\Controllers;

use App\Http\Services\NLC\CreateNlcTeam\CreateNlcAnggotaRequest;
use App\Http\Services\NLC\CreateNlcTeam\CreateNlcTeamRequest;
use App\Http\Services\NLC\CreateNlcTeam\CreateNlcTeamService;
use App\Http\Services\NLC\FindTeam\FindTeamRequest;
use App\Http\Services\NLC\FindTeam\FindTeamService;
use App\Http\Services\NLC\Scoreboard\PenyisihanService;
use App\Http\Services\NLC\Scoreboard\WarmupService;
use App\Http\Services\Voucher\Communal\CreateCommunalVoucher\CreateCommunalVoucherRequest;
use App\Http\Services\Voucher\Communal\CreateCommunalVoucher\CreateCommunalVoucherService;
use App\Http\Services\Voucher\Communal\ListTeamUsingCommunalVoucher\ListTeamUsingCommunalVoucherRequest;
use App\Http\Services\Voucher\Communal\ListTeamUsingCommunalVoucher\ListTeamUsingCommunalVoucherService;
use App\Models\JumlahAnggotaTim;
use App\Models\Mechanism\UnitOfWork;
use App\Models\TeamEventEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NlcTeamController extends Controller
{
    private UnitOfWork $unit_of_work;

    /**
     * NlcTeamController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

    public function warmupScoreboard(): JsonResponse
    {
        /** @var WarmupService $service */
        $service = resolve(WarmupService::class);

        try {
            $response = $service->execute();
        } catch (\Throwable $exception) {
            throw $exception;
        }
        return $this->successWithData($response);
    }

    public function penyisihanScoreboard(): JsonResponse
    {
        /** @var PenyisihanService $service */
        $service = resolve(PenyisihanService::class);

        try {
            $response = $service->execute();
        } catch (\Throwable $exception) {
            throw $exception;
        }

        return $this->successWithData($response);
    }


    public function createTeam(Request $request): JsonResponse
    {
        $request->validate(
            [
                'anggota' => 'nullable|array|max:' . JumlahAnggotaTim::UPPER_LIMIT,
                'anggota.*.email' => 'required_with:anggota|max:255|email',
                'anggota.*.nisn' => 'required_with:anggota|numeric|digits_between:1,20',
                'anggota.*.name' => 'required_with:anggota|max:255',
                'anggota.*.phone' => 'required_with:anggota|max:255',
                'anggota.*.alamat' => 'required_with:anggota|max:100',
                'anggota.*.id_line' => 'nullable|max:20',
                'anggota.*.id_facebook' => 'nullable|max:50',
                'anggota.*.kp_anggota' => 'required_with:anggota|image|max:2048',

                'kota_id' => 'required|exists:regions,id',
                'ketua_nisn' => 'required|numeric|digits_between:1,20',
                'ketua_alamat' => 'required|max:100',
                'ketua_id_line' => 'nullable|max:20',
                'ketua_id_facebook' => 'nullable|max:50',

                'status_id' => 'required|numeric', # TODO nggak ingat ini apa
                'team_name' => 'required|max:100',
                'team_password' => 'required|min:8|max:255',
                'team_institusi' => 'required|max:50',
                'kp_ketua' => 'required|image|max:2048',
            ]
		);

		$anggota_array = $request->anggota;

		/** @var CreateNlcAnggotaRequest()[] $anggota_request */
		$anggota_request = [];

		foreach ((array) $anggota_array as $anggota) {
			$anggota_request[] = new CreateNlcAnggotaRequest(
				$anggota['email'],
				$anggota['nisn'],
				$anggota['name'],
				$anggota['phone'],
				$anggota['alamat'],
				array_key_exists('id_line', $anggota) ? $anggota['id_line'] : null,
				array_key_exists('id_facebook', $anggota) ? $anggota['id_facebook'] : null,
				$anggota['kp_anggota']
			);
		}

		$input = new CreateNlcTeamRequest(
			(int)$request->input('kota_id'),
			Auth::user(),
			$request->input('ketua_nisn'),
			$request->input('ketua_alamat'),
			$request->input('ketua_id_line'),
			$request->input('ketua_id_facebook'),
			$request->input('status_id'),
			$request->input('team_name'),
			// new TeamEventEnum($request->input('event')),
			TeamEventEnum::NLC,
			$request->input('team_password'),
			$request->input('team_institusi'),
			$request->file('kp_ketua'),
			$anggota_request
		);

		/** @var CreateNlcTeamService $service */
		$service = resolve(CreateNlcTeamService::class);

		$this->unit_of_work->begin();
		$response = $service->execute($input);
		$this->unit_of_work->commit();

		return $this->successWithData($response);
	}

	public function findTeam(Request $request): JsonResponse
	{
		$request->validate(
			[
				'team_id' => 'required',
			]
		);

		$input = new FindTeamRequest(
			$request->input('team_id'),
			Auth::user()
		);

		/** @var FindTeamService $service */
		$service = resolve(FindTeamService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}

	public function createCommunalVoucher(Request $request): JsonResponse
	{
		$request->validate(
			[
				'jumlah_tim' => 'required|numeric|min:3|max:6',
			]
		);

		$input = new CreateCommunalVoucherRequest(
			Auth::user(),
			$request->input('jumlah_tim')
		);

		/** @var CreateCommunalVoucherService $service */
		$service = resolve(CreateCommunalVoucherService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}

	public function listTeamUsingCommunalVoucher(Request $request): JsonResponse
	{
		$input = new ListTeamUsingCommunalVoucherRequest(
			Auth::user()
		);

		/** @var ListTeamUsingCommunalVoucherService $service */
		$service = resolve(ListTeamUsingCommunalVoucherService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}
}
