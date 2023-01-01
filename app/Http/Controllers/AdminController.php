<?php

namespace App\Http\Controllers;


use App\Exports\NlcTeamExport;
use App\Exports\NpcJuniorTeamExport;
use App\Exports\NpcSeniorTeamExport;
use App\Exports\NstExport;
use App\Http\Services\AdminDetailTeam\AdminDetailTeamRequest;
use App\Http\Services\AdminDetailTeam\AdminDetailTeamResponse;
use App\Http\Services\AdminDetailTeam\AdminDetailTeamService;
use App\Http\Services\AdminTeamTable\AdminTeamTableRequest;
use App\Http\Services\AdminTeamTable\AdminTeamTableService;
use App\Http\Services\AdminUpdateTeam\AdminUpdateTeamService;
use App\Http\Services\AdminUpdateTeam\InputAnggotaRequest;
use App\Http\Services\AdminUpdateTeam\InputPembayaranRequest;
use App\Http\Services\AdminUpdateTeam\InputTeamRequest;
use App\Http\Services\DeleteTeam\DeleteTeamRequest;
use App\Http\Services\DeleteTeam\DeleteTeamService;
use App\Http\Services\ListPeserta\ListPesertaService;
use App\Http\Services\Voucher\ActivateVoucher\ActivateVoucherRequest;
use App\Http\Services\Voucher\ActivateVoucher\ActivateVoucherService;
use App\Http\Services\Voucher\CreateVoucher\CreateVoucherRequest;
use App\Http\Services\Voucher\CreateVoucher\CreateVoucherService;
use App\Http\Services\Voucher\DeactivateVoucher\DeactivateVoucherRequest;
use App\Http\Services\Voucher\DeactivateVoucher\DeactivateVoucherService;
use App\Http\Services\Voucher\ListVoucher\ListVoucherService;
use App\Models\JumlahAnggotaTim;
use App\Models\Mechanism\UnitOfWork;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class AdminController extends Controller
{

	private UnitOfWork $unit_of_work;

	/**
	 * AdminController constructor.
	 * @param UnitOfWork $unit_of_work
	 */
	public function __construct(UnitOfWork $unit_of_work)
	{
		$this->unit_of_work = $unit_of_work;
	}

	public function listPeserta($event): JsonResponse
	{
		/** @var ListPesertaService $service */
		$service = resolve(ListPesertaService::class);
		$response = $service->execute($event);

		return $this->successWithData($response);
	}

	/**
	 * @throws Throwable
	 */
	public function listVoucher(): JsonResponse
	{
		/** @var ListVoucherService $service */
		$service = resolve(ListVoucherService::class);
		$response = $service->execute();

		return $this->successWithData($response);
	}

	public function createVoucher(Request $request): JsonResponse
	{
		$request->validate([
			'kode_voucher' => 'required|max:255',
			'keterangan' => 'required|max:255',
			'potongan_persen' => 'required|numeric|min:0|max:100',
			'limit_jumlah' => 'required|numeric|min:1',
			'tanggal_mulai' => 'required',
			'tanggal_berakhir' => 'required',
			'is_active' => 'required|boolean'
		]);

		$input = new CreateVoucherRequest(
			$request->input('kode_voucher'),
			$request->input('keterangan'),
			$request->input('potongan_persen'),
			$request->input('limit_jumlah'),
			$request->input('tanggal_mulai'),
			$request->input('tanggal_berakhir'),
			$request->input('is_active') == 'true'
		);

		/** @var CreateVoucherService $service */
		$service = resolve(CreateVoucherService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

	public function deactivateVoucher(Request $request): JsonResponse
	{
		$request->validate([
			'kode_voucher' => 'required|max:255',
		]);

		$input = new DeactivateVoucherRequest(
			$request->input('kode_voucher')
		);

		/** @var DeactivateVoucherService $service */
		$service = resolve(DeactivateVoucherService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

	public function activateVoucher(Request $request): JsonResponse
	{
		$request->validate([
			'kode_voucher' => 'required|max:255',
		]);

		$input = new ActivateVoucherRequest(
			$request->input('kode_voucher')
		);

		/** @var ActivateVoucherService $service */
		$service = resolve(ActivateVoucherService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

	public function listTim($event, Request $request)
	{
		$input = new AdminTeamTableRequest(
			$request->input('page'),
			$request->input('search'),
			$request->input('order_by'),
			$event,
		);

		/** @var AdminTeamTableService $service */
		$service = resolve(AdminTeamTableService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}

	public function exportNlcTeamToExcel()
	{
		return Excel::download(new NlcTeamExport, 'nlc-team-export-' . date('d-m-Y') . '.xlsx');
	}

	public function exportNpcTeamToExcel($stage)
	{
		$stage = strtolower($stage);

		if ($stage == 'junior') {
			return Excel::download(new NpcJuniorTeamExport, 'npc-junior-team-export-' . date('d-m-Y') . '.xlsx');
		} else {
			if ($stage == 'senior') {
				return Excel::download(new NpcSeniorTeamExport, 'npc-senior-team-export-' . date('d-m-Y') . '.xlsx');
			}
		}

		return $this->failedWithMsg('Npc hanya ada untuk senior dan junior', 404);
	}

	public function exportNstTicketsToExcel()
	{
		return Excel::download(new NstExport, 'nst-ticket-export-' . date('d-m-Y') . '.xlsx');
	}


	public function exportReevaTicketsToExcel()
	{
		return Excel::download(new NstExport, 'reeva-ticket-export-' . date('d-m-Y') . '.xlsx');
	}
	public function detailTeam(Request $request): JsonResponse
	{
		$request->validate([
			'team_id' => 'required'
		]);

		$input = new AdminDetailTeamRequest(
			$request->input('team_id'),
			Auth::user()
		);

		$service = resolve(AdminDetailTeamService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}

	public function updateTeam(Request $request): JsonResponse
	{
		$request->validate([
			'anggota' => 'nullable|array|max:' . JumlahAnggotaTim::UPPER_LIMIT,
            'anggota.*.nama' => 'required_with:anggota|max:255',
            'anggota.*.email' => 'required_with:anggota|max:255|email',
            'anggota.*.telp' => 'required_with:anggota|max:255',
            'anggota.*.nisn' => 'required_with:anggota|alpha_num|min:1|max:20',
            'anggota.*.alamat' => 'required_with:anggota|max:100',
            'anggota.*.line' => 'nullable|max:20',
            'anggota.*.facebook' => 'nullable|max:50',

			'ketua_anggota_id' => 'required',
			'nama_ketua' => 'required|max:255',
			'email_ketua' => 'required|max:255|email',
			'telp_ketua' => 'required|max:255',
			'nisn_ketua' => 'required|alpha_num|min:1|max:20',
			'alamat_ketua' => 'required|max:100',
			'line_ketua' => 'nullable|max:20',
			'facebook_ketua' => 'nullable|max:50',

			'kota_id' => 'required|exists:regions,id',
			'nama_team' => 'required|max:100',
			'institusi' => 'required|max:50',
			'status_id' => 'nullable|numeric',
			'tahapan_id' => 'nullable|numeric|min:0', # TODO apakah ada hubungan dengan tabel tahapan?
			'need_edit' => 'nullable|boolean',

			'jumlah_bayar' => 'nullable|numeric|min:0',
			'sumber_bayar' => 'required|max:10',
			'verified_bayar' => 'required|boolean',
			'detail_bayar' => 'nullable|max:255',

			'voucher' => 'nullable|max:255',
		]);

		/** @var AdminDetailTeamResponse $original */
		$original = $this->detailTeam($request)->original['data'];


		$anggota_array = $request->input('anggota');
		$anggotas = [];
		foreach ((array) $anggota_array as $anggota) {
			try {
				$anggota_model = $original->getAnggota($anggota['anggota_id']);

				/** @var User $user_model */
				$user_model = $anggota_model->user()->first();
			} catch (Throwable $e) {
				return $this->failedWithMsg("Anggota with id " . $anggota['anggota_id'] . " not found", 1011);
			}
			/** @var InputAnggotaRequest[] $anggotas */
			$anggotas[] = new InputAnggotaRequest(
				$anggota_model,
				$user_model,
				array_key_exists('nama', $anggota) ? $anggota['nama'] : null,
				array_key_exists('email', $anggota) ? $anggota['email'] : null,
				array_key_exists('telp', $anggota) ? $anggota['telp'] : null,
				array_key_exists('nisn', $anggota) ? $anggota['nisn'] : null,
				array_key_exists('alamat', $anggota) ? $anggota['alamat'] : null,
				array_key_exists('line', $anggota) ? $anggota['line'] : null,
				array_key_exists('facebook', $anggota) ? $anggota['facebook'] : null,
				'ANGGOTA'
			);
		}
		try {
			$ketua_anggota_model = $original->getAnggota($request->input('ketua_anggota_id'));

			/** @var User $ketua_user_model */
			$ketua_user_model = $ketua_anggota_model->user()->first();
		} catch (Throwable $e) {
			return $this->failedWithMsg("Anggota with id " . $request->input('ketua_anggota_id') . " not found", 1012);
		}
		$ketua = new InputAnggotaRequest(
			$ketua_anggota_model,
			$ketua_user_model,
			$request->input('nama_ketua'),
			$request->input('email_ketua'),
			$request->input('telp_ketua'),
			$request->input('nisn_ketua'),
			$request->input('alamat_ketua'),
			$request->input('line_ketua'),
			$request->input('facebook_ketua'),
			'KETUA'
		);
		$team = new InputTeamRequest(
			$original->getTeam(),
			$request->input('kota_id'),
			$request->input('nama_team'),
			$request->input('status_id'),
			$request->input('tahapan_id'),
			$request->input('institusi')
		);
		$pembayaran = new InputPembayaranRequest(
			$original->getBayar(),
			$request->input('jumlah_bayar'),
			$request->input('verified_bayar'),
			$request->input('sumber_bayar'),
			$request->input('voucher'),
			$request->input('detail_bayar'),
			$request->input('need_edit')
		);
		/** @var AdminUpdateTeamService $service */
		$service = resolve(AdminUpdateTeamService::class);

		$this->unit_of_work->begin();
		$response = $service->execute(
			$team,
			$ketua,
			$anggotas,
			$pembayaran
		);
		$this->unit_of_work->commit();

		return $this->successWithData($response);
	}

	public function deleteTeam(Request $request): JsonResponse
	{
		$request->validate([
			'team_id' => 'required'
		]);

		$input = new DeleteTeamRequest(
			$request->input('team_id')
		);

		/** @var DeleteTeamService $service */
		$service = resolve(DeleteTeamService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}
}
