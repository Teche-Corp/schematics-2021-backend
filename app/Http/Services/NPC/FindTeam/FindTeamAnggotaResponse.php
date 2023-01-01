<?php


namespace App\Http\Services\NPC\FindTeam;


use JsonSerializable;

class FindTeamAnggotaResponse implements JsonSerializable
{
    private string $nama;
    private string $email;
    private string $nomor_telepon;
    private string $nisn;
    private string $alamat;
    private ?string $id_line;
    private string $link_bukti_sah;
    private string $role;

    /**
     * FindTeamAnggotaResponse constructor.
     * @param string $nama
     * @param string $email
     * @param string $nomor_telepon
     * @param string $nisn
     * @param string $alamat
     * @param string|null $id_line
     * @param string $link_bukti_sah
     * @param string $role
     */
    public function __construct(string $nama, string $email, string $nomor_telepon, string $nisn, string $alamat, ?string $id_line, string $link_bukti_sah, string $role)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->nomor_telepon = $nomor_telepon;
        $this->nisn = $nisn;
        $this->alamat = $alamat;
        $this->id_line = $id_line;
        $this->link_bukti_sah = $link_bukti_sah;
        $this->role = $role;
    }


    public function jsonSerialize()
    {
        return [
            "nama" => $this->nama,
            "email" => $this->email,
            "nomor_telepon" => $this->nomor_telepon,
            "nisn" => $this->nisn,
            "alamat" => $this->alamat,
            "id_line" => $this->id_line ?? null,
            "link_bukti_sah" => $this->link_bukti_sah,
            "role" => $this->role
        ];
    }
}
