<?php


namespace App\Http\Services\AdminUpdateTeam;

use JsonSerializable;

class AdminUpdateResponse implements JsonSerializable
{
    private InputTeamRequest $team;
    /** @var InputAnggotaRequest[] $anggotas*/
    private array $anggotas;
    private ?JsonSerializable $pembayaran;

    /**
     * AdminUpdateResponse constructor.
     * @param InputTeamRequest $team
     * @param InputAnggotaRequest[] $anggotas
     * @param InputPembayaranRequest|null $pembayaran
     */
    public function __construct(InputTeamRequest $team, array $anggotas, ?JsonSerializable $pembayaran)
    {
        $this->team = $team;
        $this->anggotas = $anggotas;
        $this->pembayaran = $pembayaran;
    }

    public function jsonSerialize()
    {
        return [
            "team_id" => $this->team->getTeamModel()->team_id,
            "status_id" => $this->team->getTeamModel()->status_id,
            "tahapan_id" => $this->team->getTeamModel()->tahapan_id,
            "team_name" => $this->team->getTeamModel()->team_name,
            "event" => $this->team->getTeamModel()->event,
            "institusi" => $this->team->getTeamModel()->team_institusi,
            "anggota" => $this->anggotas,
            "kota" => $this->team->getTeamModel()->kota()->first(),
            "bukti_pembayaran" => $this->pembayaran
        ];
    }

}
