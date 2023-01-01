<?php

namespace App\Http\Services\NLC\CreateNlcTeam;

use Illuminate\Http\UploadedFile;

class CreateNlcAnggotaRequest
{
    private string $email;
    private string $nisn;
    private string $name;
    private string $phone;
    private string $alamat;
    private ?string $id_line;
    private ?string $id_facebook;
    private UploadedFile $kartu_anggota;

	/**
	 * NpcTeamAnggotaRequest constructor.
	 * @param string $email
	 * @param string $nisn
	 * @param string $name
	 * @param string $phone
	 * @param string $alamat
	 * @param ?string $id_line
	 * @param ?string $id_facebook
	 * @param UploadedFile $kp_anggota
	 */
    public function __construct(
        string $email, string $nisn, string $name, string $phone, string $alamat, ?string $id_line, ?string $id_facebook, UploadedFile $kp_anggota)
    {
        $this->email = $email;
        $this->nisn = $nisn;
        $this->name = $name;
        $this->phone = $phone;
        $this->alamat = $alamat;
        $this->id_line = $id_line;
        $this->id_facebook = $id_facebook;
        $this->kartu_anggota = $kp_anggota;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNisn(): string
    {
        return $this->nisn;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getAlamat(): string
    {
        return $this->alamat;
    }

    /**
     * @return string|null
     */
    public function getIdLine(): ?string
    {
        return $this->id_line;
    }

    /**
     * @return string|null
     */
    public function getIdFacebook(): ?string
    {
        return $this->id_facebook;
    }

    public function getKartuAnggota(): UploadedFile
    {
        return $this->kartu_anggota;
    }
}
