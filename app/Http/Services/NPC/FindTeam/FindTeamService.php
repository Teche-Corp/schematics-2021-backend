<?php


namespace App\Http\Services\NPC\FindTeam;


use App\Exceptions\SchematicsException;
use App\Models\Anggota;
use App\Models\BuktiPembayaranTim;
use App\Models\FileAnggota;
use App\Models\Region;
use App\Models\Tahapan;
use App\Models\Team;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class FindTeamService
{
    public function execute(FindTeamRequest $request)
    {
		//TODO: OPTIMISASI QUERY

		/** @var Team $team */
		$team = Team::where('team_id', '=', $request->getTeamId())->first();

		if (!$team) {
			throw SchematicsException::build('team-not-found');
		}

		$user_id = $request->getUser()->id;
		if (!$team->anggota()->where('user_id', $user_id)->exists()) {
			throw SchematicsException::build('no-access-to-team');
		}

		$user_ketua = User::where('id', '=', $team->ketua_id)->first();
		$anggota_ketua = Anggota::where('user_id', '=', $team->ketua_id)->first();
		$kota = Region::where('id', '=', $team->kota_id)->first();

		$bukti_bayar = BuktiPembayaranTim::where('team_id', '=', $request->getTeamId())->first();

		$anggota_rows = Anggota::where('team_id', '=', $request->getTeamId())->get();

		$anggota_file = FileAnggota::where('anggota_id', '=', $anggota_ketua->anggota_id)->first();

		$tahapan = Tahapan::where('id', '=', $team->status_id)->first();

		$applied_voucher = DB::table('applied_voucher')
			->where('team_id', $team->team_id)->first();

		$voucher_response = null;

		if ($applied_voucher) {
			$voucher = Voucher::where('kode_voucher', $applied_voucher->kode_voucher)->first();

            $voucher_response = new FindTeamVoucherResponse(
                $voucher->kode_voucher,
                $voucher->potongan_persen
            );
        }

        /** @var FindTeamAnggotaResponse[] $anggota_payload */
        $anggota_payload = [];

        foreach ($anggota_rows as $anggota_row) {
            $anggota_user = User::where('id', '=', $anggota_row->user_id)->first();
            $anggota_payload[] = new FindTeamAnggotaResponse(
                $anggota_user->name,
                $anggota_user->email,
                $anggota_user->phone,
                $anggota_row->anggota_nisn,
                $anggota_row->anggota_alamat,
                $anggota_row->anggota_id_line ?? null,
                $anggota_row->file->url,
                $anggota_row->user_id == $team->ketua_id ? "ketua" : "anggota"
            );
        }

        /** @var FindTeamAnggotaResponse[] $anggota_payload */
        $anggota_payload = [];

        foreach ($anggota_rows as $anggota_row) {
            $anggota_user = User::where('id', '=', $anggota_row->user_id)->first();
            $anggota_payload[] = new FindTeamAnggotaResponse(
                $anggota_user->name,
                $anggota_user->email,
                $anggota_user->phone,
                $anggota_row->anggota_nisn,
                $anggota_row->anggota_alamat,
                $anggota_row->anggota_id_line ?? null,
                $anggota_row->file->url,
                $anggota_row->user_id == $team->ketua_id ? "ketua" : "anggota"
            );
        }

        return new FindTeamResponse(
            $team->team_id,
            $team->team_name,
            $team->team_institusi,
            $kota->regency_name,
            $kota->province_name,
            $kota->region_name,
            $user_ketua->name,
            $user_ketua->email,
            $user_ketua->phone,
            $anggota_ketua->anggota_nisn,
            $anggota_ketua->anggota_alamat,
            $anggota_ketua->anggota_id_line ?? null,
            $anggota_file->url,
            $anggota_payload,
            $tahapan == null ? null : $tahapan->name,
            $bukti_bayar ? $bukti_bayar->is_verified : null,
            $team->event,
            $voucher_response
        );
    }

}
