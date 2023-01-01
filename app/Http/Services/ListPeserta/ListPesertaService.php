<?php


namespace App\Http\Services\ListPeserta;


use App\Models\Anggota;
use App\Models\Team;

class ListPesertaService
{
    public function execute($event)
    {
        $teams = Team::all()->where('event',$event);
        $list = [];
        foreach($teams as $team)
        {
            $anggotas = $team->anggota()->get();
            $member = [];
            foreach($anggotas as $anggota)
            {
                $user = $anggota->user()->first();
                $full = new AnggotaUserBuilder($anggota,$user);  
                $member[] = $full->build();
            }

            $list[] = [
                'team_id' => $team->team_id,
                'team_name' => $team->team_name,
                'members' => $member
            ];
        }
        return $list;
    }
}
