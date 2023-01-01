<?php


namespace App\Http\Services\NPC\CreateNpcTeamJunior;


use App\Exceptions\SchematicsException;
use App\Models\Anggota;
use App\Models\FileAnggota;
use App\Models\Team;
use App\Models\TeamEventEnum;
use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateNpcTeamJuniorService
{
    public function execute(CreateNpcTeamJuniorRequest $request)
    {
        $this->validateRequest($request);

        /** @var User $user_ketua */
        $user_ketua = $request->getUserKetua();

        if (!$user_ketua)
            throw new SchematicsException("User ketua tidak ditemukan", 1013);

        $team = Team::where('event', $request->getEvent())
            ->where(function ($query) use ($request) {
                $query->where('ketua_id', $request->getUserIdKetua())
                    ->orWhere('team_name', $request->getTeamName());
            })
            ->exists();

        if ($team)
            throw new SchematicsException("Nama tim telah digunakan", 1014);

		try {
			$team = Team::create(
				[
					'kota_id' => $request->getKotaId(),
					'ketua_id' => $request->getUserIdKetua(),
					'status_id' => $request->getStatusId(),
					'team_name' => $request->getTeamName(),
					'event' => $request->getEvent(),
					'team_password' => Hash::make($request->getTeamPassword()),
					'team_institusi' => $request->getTeamInstitusi(),
				]
			);
		} catch (Exception $e) {
			throw SchematicsException::build('db-fail-to-save');
		}

        $ketuaAsAnggota = $this->saveKetuaAsAnggota($request, $team);

        $ketuaAsAnggota->save();
        $this->saveKartu($request->getKartuKetua(), "ketua", $team->team_id, $ketuaAsAnggota->anggota_id);

        return new CreateNpcTeamJuniorResponse(
        	$team->team_id
		);
    }

    private function saveKetuaAsAnggota(CreateNpcTeamJuniorRequest $request, Team $team)
    {
		$anggota = Anggota::where('user_id', $request->getUserIdKetua())->first();

		if ($anggota) {
			// jadi bisa daftar ke event lain
			if (
				$anggota->team->event == TeamEventEnum::NPC_JUNIOR ||
				$anggota->team->event == TeamEventEnum::NPC_SENIOR
			) {
				throw new SchematicsException("User ketua telah digunakan tim lain", 1016);
			}
		}

        $anggota = new Anggota([
            'team_id' => $team->team_id,
            'user_id' => $request->getUserIdKetua(),
            'anggota_nisn' => $request->getKetuaNisn(),
            'anggota_alamat' => $request->getKetuaAlamat(),
            'anggota_id_line' => $request->getKetuaIdLine(),
            'anggota_id_facebook' => $request->getKetuaIdFacebook()
        ]);
        return $anggota;
    }

    private function saveKartu(UploadedFile $kartu, string $rank, int $team_id, int $anggota_id)
    {
        $kartuExt = $kartu->guessExtension();

        $filename = 'kartu_.' . $rank . '_' . 'teamNPC' . $team_id . '.' . Str::random(10) . (($kartuExt == '') ? '' : '.' . $kartuExt);

        $file = Storage::disk('public')->put('npc_team_file/' . $filename, file_get_contents($kartu));

        if (!$file) throw new SchematicsException("Gagal menyimpan file", 1); // TODO masukkin ke config error

        FileAnggota::create([
            'anggota_id' => $anggota_id,
            'url' => Storage::disk('public')->url('npc_team_file/' . $filename)
        ]);
    }

    /**
     * @param CreateNpcTeamJuniorRequest $request
     * @throws SchematicsException
     */
    private function validateRequest(CreateNpcTeamJuniorRequest $request)
    {
        Validator::validate([
            'kartu_ketua' => $request->getKartuKetua(),
        ], [
            'kartu_ketua' => 'required|image|max:2048',
        ]);
    }
}
