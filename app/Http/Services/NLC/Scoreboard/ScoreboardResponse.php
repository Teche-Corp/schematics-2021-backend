<?php


namespace App\Http\Services\NLC\Scoreboard;


use JsonSerializable;

class ScoreboardResponse implements JsonSerializable
{
    private int $peringkat;
    private int $team_id;
    private string $nama_team;
    private string $nama_sekolah;
    private string $nama_region;
    private ?float $skor_total;
    private string $description;
    private int $status;

    /**
     * ScoreboardResponse constructor.
     * @param int $peringkat
     * @param int $team_id
     * @param string $nama_team
     * @param string $nama_sekolah
     * @param string $nama_region
     * @param float|null $skor_total
     * @param string $description
     * @param int $status
     */
    public function __construct(int $peringkat, int $team_id, string $nama_team, string $nama_sekolah, string $nama_region, ?float $skor_total, string $description, int $status)
    {
        $this->peringkat = $peringkat;
        $this->team_id = $team_id;
        $this->nama_team = $nama_team;
        $this->nama_sekolah = $nama_sekolah;
        $this->nama_region = $nama_region;
        $this->skor_total = $skor_total;
        $this->description = $description;
        $this->status = $status;
    }


    public function jsonSerialize(): array
    {
        return [
            "peringkat" => $this->peringkat,
            "team_id" => $this->team_id,
            "nama_team" => $this->nama_team,
            "nama_sekolah" => $this->nama_sekolah,
            "nama_region" => $this->nama_region,
            "skor_total" => $this->skor_total,
            "description" => $this->description,
            "status" => $this->status
        ];
    }
}
