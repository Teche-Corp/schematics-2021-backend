<?php


namespace App\Http\Services\AdminUpdateTeam;

use App\Models\Team;

class InputTeamRequest
{
    private Team $team_model;
    private ?int $kota_id;
    private ?string $team_name;
    private ?int $status_id;
    private ?int $tahapan_id;
    private ?string $institusi;

    /**
     * InputTeamRequest constructor.
     * @param Team $team_model
     * @param int|null $kota_id
     * @param string|null $team_name
     * @param int|null $status_id
     * @param int|null $tahapan_id
     * @param string|null $institusi
     */
    public function __construct(
        Team $team_model,
        ?int $kota_id,
        ?string $team_name,
        ?int $status_id,
        ?int $tahapan_id,
        ?string $institusi
    )
    {
        $this->team_model = $team_model;
        $this->kota_id = $kota_id;
        $this->team_name = $team_name;
        $this->status_id = $status_id;
        $this->tahapan_id = $tahapan_id;
        $this->institusi = $institusi;
    }

    /**
     * @return Team
     */
    public function getTeamModel(): Team
    {
        return $this->team_model;
    }

    /**
     * @return int|null
     */
    public function getKotaId(): ?int
    {
        return $this->kota_id;
    }

    /**
     * @return string|null
     */
    public function getTeamName(): ?string
    {
        return $this->team_name;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->status_id;
    }

    /**
     * @return int|null
     */
    public function getTahapanId(): ?int
    {
        return $this->tahapan_id;
    }

    /**
     * @return string|null
     */
    public function getInstitusi(): ?string
    {
        return $this->institusi;
    }

    public function updateAll(): void
    {
        $this->setKotaId();
        $this->setTeamName();
        $this->setStatusId();
        $this->setTahapanId();
        $this->setInstitusi();
        $this->team_model->save();
    }

    /**
     * @param void
     */
    public function setKotaId(): void
    {
        if ($this->kota_id && $this->team_model->kota_id != $this->kota_id)
            $this->team_model->kota_id = $this->kota_id;
        else
            $this->kota_id = $this->team_model->kota_id;
    }

    /**
     * @param void
     */
    public function setTeamName(): void
    {
        if ($this->team_name && $this->team_model->team_name != $this->team_name)
            $this->team_model->team_name = $this->team_name;
        else
            $this->team_name = $this->team_model->team_name;
    }

    /**
     * @param void
     */
    public function setStatusId(): void
    {
        if ($this->status_id && $this->team_model->status_id != $this->status_id)
            $this->team_model->status_id = $this->status_id;
        else
            $this->status_id = $this->team_model->status_id;
    }

    /**
     * @param void
     */
    public function setTahapanId(): void
    {
        if ($this->tahapan_id && $this->team_model->tahapan_id != $this->tahapan_id)
            $this->team_model->tahapan_id = $this->tahapan_id;
        else
            $this->tahapan_id = $this->team_model->tahapan_id;
    }

    /**
     * @param void
     */
    public function setInstitusi(): void
    {
        if ($this->institusi && $this->team_model->team_institusi != $this->institusi)
            $this->team_model->team_institusi = $this->institusi;
        else
            $this->institusi = $this->team_model->team_institusi;
    }
}
