<?php


namespace App\Http\Services\NLC\Scoreboard;


use Database\Seeders\NlcWarmupScoreboardSeeder;

class WarmupService
{
    public function execute(): array
    {
        $datas = (new NlcWarmupScoreboardSeeder())->data;
        return collect($datas)->map(
            function ($obj) {
                return new ScoreboardResponse(
                    $obj['peringkat'],
                    $obj['team_id'],
                    $obj['nama_team'],
                    $obj['nama_sekolah'],
                    $obj['nama_region'],
                    $obj['skor_total'],
                    $obj['description'],
                    $obj['status']
                );
            }
        )->all();
    }
}
