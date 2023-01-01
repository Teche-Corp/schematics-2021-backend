<?php


namespace App\Http\Services\DeleteTeam;


use App\Exceptions\SchematicsException;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class DeleteTeamService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(DeleteTeamRequest $request)
	{
		/** @var Team $team */
		$team = Team::where('team_id', $request->getTeamId())->first();

		if (!$team) {
			throw SchematicsException::build('team-not-found');
		}

		DB::table('applied_voucher')
			->where('team_id', $team->team_id)
			->delete();
		$team->anggota()->delete();
		$team->buktiPembayaran()->delete();
		$team->delete();
	}
}