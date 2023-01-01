<?php


namespace App\Http\Services\NPC\CreateNpcTeamSenior;


use App\Exceptions\SchematicsException;
use App\Models\Anggota;
use App\Models\FileAnggota;
use App\Models\JumlahAnggotaTim;
use App\Models\Team;
use App\Models\TeamEventEnum;
use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateNpcTeamSeniorService
{
    public function execute(CreateNpcTeamSeniorRequest $request)
    {
        /** @var User $user_ketua */
        $user_ketua = $request->getUserKetua();

        if (!$user_ketua)
            throw new SchematicsException("User Ketua tidak ditemukan", 1013);

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

        if (count($request->getAnggota()) > 0) {
            list($anggotas, $file_anggota) = $this->createAnggota($request, $team);

            foreach ($anggotas as $index => $a) {
                $a->save();
                $this->saveKartu($file_anggota[$index], "anggota", $team->team_id, $a->anggota_id);
            }
        }

        $ketuaAsAnggota->save();
        $this->saveKartu($request->getKartuKetua(), "ketua", $team->team_id, $ketuaAsAnggota->anggota_id);

        return new CreateNpcTeamSeniorResponse(
            $team->team_id
        );
    }

    private function saveKetuaAsAnggota(CreateNpcTeamSeniorRequest $request, Team $team)
	{
		$anggota = DB::table('anggota')
			->where('user_id', $request->getUserIdKetua())
			->join('teams', 'anggota.team_id', 'teams.team_id')
			->whereIn('teams.event', [TeamEventEnum::NPC_JUNIOR, TeamEventEnum::NPC_SENIOR])
			->first();

		if ($anggota) {
			throw new SchematicsException("User ketua telah digunakan tim lain", 1016);
		}

		$anggota = new Anggota(
			[
				'team_id' => $team->team_id,
				'user_id' => $request->getUserIdKetua(),
				'anggota_nisn' => $request->getKetuaNisn(),
				'anggota_alamat' => $request->getKetuaAlamat(),
				'anggota_id_line' => $request->getKetuaIdLine(),
				'anggota_id_facebook' => $request->getKetuaIdFacebook()
			]
		);
        return $anggota;
    }

    private function createAnggota(CreateNpcTeamSeniorRequest $request, Team $team)
    {
        $new_anggotas = [];
        $file_anggota = [];
        $this->checkTeamMemberCount($request, $team);

		foreach ($request->getAnggota() as $anggotaRequest) // array of CreateAnggotaRequest
		{
			$user_anggota = User::where('email', $anggotaRequest->getEmail())->first();


			if ($user_anggota) {
				$anggota = DB::table('anggota')->where('user_id', $user_anggota->user_id)
					->join('teams', 'anggota.team_id', 'teams.team_id')
					->whereIn('teams.event', [TeamEventEnum::NPC_JUNIOR, TeamEventEnum::NPC_SENIOR])
					->first();

				// jadi bisa daftar ke event lain
				if ($anggota) {
					throw new SchematicsException("Anggota sudah ada", 1017);
				}
			} else {
				$user_anggota = User::create(
					[
						'name' => $anggotaRequest->getName(),
						'email' => $anggotaRequest->getEmail(),
						'phone' => $anggotaRequest->getPhone(),
						'password' => Hash::make($request->getTeamPassword()),
						'user_role' => UserRole::USER,
					]
				);
			}

            foreach ($request->getAnggota() as $check_email_anggota) {
                $check_user_anggota = User::where('email', $check_email_anggota->getEmail())->first();

                if ($check_user_anggota) {
                    if ($user_anggota->id == $check_user_anggota->id) continue;

                    if ($anggotaRequest->getEmail() == $check_user_anggota->email)
                        throw SchematicsException::build("duplicate-email-team");
                }

            }

            $new_anggotas[] = new Anggota(
                [
                    'team_id' => $team->team_id,
                    'user_id' => $user_anggota->id,
                    'anggota_nisn' => $anggotaRequest->getNisn(),
                    'anggota_alamat' => $anggotaRequest->getAlamat(),
                    'anggota_id_line' => $anggotaRequest->getIdLine(),
                    'anggota_id_facebook' => $anggotaRequest->getIdFacebook()
                ]
            );
            $file_anggota[] = $anggotaRequest->getKartuAnggota();
        }
        return array($new_anggotas, $file_anggota);
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
     * @param CreateNpcTeamSeniorRequest $request
     * @param Team $team
     * @throws SchematicsException
     */
    private function checkTeamMemberCount(CreateNpcTeamSeniorRequest $request, Team $team): void
    {
        $jumlah_anggota = count($request->getAnggota());

        if ($jumlah_anggota < 0 || $jumlah_anggota > JumlahAnggotaTim::NPC_SENIOR) {
            $team->delete();
            throw SchematicsException::build('invalid-team-member-count');
        }
    }
}
