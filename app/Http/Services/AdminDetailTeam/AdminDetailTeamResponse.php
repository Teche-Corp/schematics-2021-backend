<?php

namespace App\Http\Services\AdminDetailTeam;

use App\Models\Anggota;
use App\Models\BuktiPembayaranTim;
use App\Models\Region;
use App\Models\Team;
use JsonSerializable;

class AdminDetailTeamResponse implements JsonSerializable
{
    private Team $team;
    private array $anggotas;
    private ?BuktiPembayaranTim $bayar;
    private Region $region;
    private int $team_id;
    private int $status_id;
    private ?int $tahapan_id;
    private string $team_name;
    private string $event;
    private string $institusi;
    private array $anggota_response;
    private JsonSerializable $kota;
    private ?JsonSerializable $pembayaran;

    public function __construct(
        Team $team,
        array $anggotas,
        ?BuktiPembayaranTim $bayar,
        Region $region,
        int $team_id,
        int $status_id,
        ?int $tahapan_id,
        string $team_name,
        string $event,
        string $institusi,
        /** @var AdminDetailAnggotaResponse[] $anggota_response */
        array $anggota_response,
        JsonSerializable $kota,
        ?JsonSerializable $pembayaran
    )
    {
        $this->team = $team;
        $this->anggotas = $anggotas;
        $this->bayar = $bayar;
        $this->region = $region;
        $this->team_id = $team_id;
        $this->status_id = $status_id;
        $this->tahapan_id = $tahapan_id;
        $this->team_name = $team_name;
        $this->event = $event;
        $this->institusi = $institusi;
        $this->anggota_response = $anggota_response;
        $this->kota = $kota;
        $this->pembayaran = $pembayaran;
    }

    /**
     * @param int $id
     * @return Anggota|null
     */
    public function getAnggota(int $id): ?Anggota
    {
        foreach ($this->anggotas as $anggota) {
            if ($anggota->anggota_id == $id)
                return $anggota;
        }
        return null;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return BuktiPembayaranTim|null
     */
    public function getBayar(): BuktiPembayaranTim|null
    {
        return $this->bayar?? null;
    }

    public function jsonSerialize()
    {
        return [
            "team_id" => $this->team_id,
            "status_id" => $this->status_id,
            "tahapan_id" => $this->tahapan_id,
            "team_name" => $this->team_name,
            "event" => $this->event,
            "institusi" => $this->institusi,
            "anggota" => $this->anggota_response,
            "kota" => $this->kota,
            "bukti_pembayaran" => $this->pembayaran
        ];
    }
}
