<?php


namespace App\Http\Services\NPC\CreateNpcTeamJunior;


use App\Models\User;
use Illuminate\Http\UploadedFile;

class CreateNpcTeamJuniorRequest
{
    private int $kota_id;
    private User $user_ketua;
    private string $user_id_ketua;
    private string $ketua_nisn;
    private string $ketua_alamat;
    private ?string $ketua_id_line;
    private ?string $ketua_id_facebook;
    private string $status_id;
    private string $team_name;
    private string $event;
    private string $team_password;
    private string $team_institusi;
    private UploadedFile $kartu_ketua;

    /**
     * CreateNpcTeamJuniorRequest constructor.
     * @param int $kota_id
     * @param User $user_ketua
     * @param string $ketua_nisn
     * @param string $ketua_alamat
     * @param string|null $ketua_id_line
     * @param string|null $ketua_id_facebook
     * @param string $status_id
     * @param string $team_name
     * @param string $event
     * @param string $team_password
     * @param string $team_institusi
     * @param UploadedFile $kartu_ketua
     */
    public function __construct(int $kota_id, User $user_ketua, string $ketua_nisn, string $ketua_alamat, ?string $ketua_id_line, ?string $ketua_id_facebook, string $status_id, string $team_name, string $event, string $team_password, string $team_institusi, UploadedFile $kartu_ketua)
    {
        $this->kota_id = $kota_id;
        $this->user_ketua = $user_ketua;
        $this->user_id_ketua = $user_ketua->id;
        $this->ketua_nisn = $ketua_nisn;
        $this->ketua_alamat = $ketua_alamat;
        $this->ketua_id_line = $ketua_id_line;
        $this->ketua_id_facebook = $ketua_id_facebook;
        $this->status_id = $status_id;
        $this->team_name = $team_name;
        $this->event = $event;
        $this->team_password = $team_password;
        $this->team_institusi = $team_institusi;
        $this->kartu_ketua = $kartu_ketua;
    }

    /**
     * @return int
     */
    public function getKotaId(): int
    {
        return $this->kota_id;
    }

    /**
     * @return User
     */
    public function getUserKetua(): User
    {
        return $this->user_ketua;
    }

    /**
     * @return string
     */
    public function getUserIdKetua(): string
    {
        return $this->user_id_ketua;
    }

    /**
     * @return string
     */
    public function getKetuaNisn(): string
    {
        return $this->ketua_nisn;
    }

    /**
     * @return string
     */
    public function getKetuaAlamat(): string
    {
        return $this->ketua_alamat;
    }

    /**
     * @return string|null
     */
    public function getKetuaIdLine(): ?string
    {
        return $this->ketua_id_line;
    }

    /**
     * @return string|null
     */
    public function getKetuaIdFacebook(): ?string
    {
        return $this->ketua_id_facebook;
    }

    /**
     * @return string
     */
    public function getStatusId(): string
    {
        return $this->status_id;
    }

    /**
     * @return string
     */
    public function getTeamName(): string
    {
        return $this->team_name;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return string
     */
    public function getTeamPassword(): string
    {
        return $this->team_password;
    }

    /**
     * @return string
     */
    public function getTeamInstitusi(): string
    {
        return $this->team_institusi;
    }

    /**
     * @return UploadedFile
     */
    public function getKartuKetua(): UploadedFile
    {
        return $this->kartu_ketua;
    }


}
