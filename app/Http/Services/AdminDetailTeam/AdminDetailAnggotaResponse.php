<?php

namespace App\Http\Services\AdminDetailTeam;

use JsonSerializable;

class AdminDetailAnggotaResponse implements JsonSerializable
{
    private int $anggota_id;
    private string $nama;
    private string $email;
    private string $nomor_telepon;
    private string $nisn;
    private string $alamat;
    private ?string $id_line;
    private ?string $id_facebook;
    private ?string $url;
    private string $role;

    public function __construct(
        int $anggota_id,
        string $nama,
        string $email,
        string $nomor_telepon,
        string $nisn,
        string $alamat,
        ?string $id_line,
        ?string $id_facebook,
        ?string $url,
        string $role
    )
    {
        $this->anggota_id = $anggota_id;
        $this->nama = $nama;
        $this->email = $email;
        $this->nomor_telepon = $nomor_telepon;
        $this->nisn = $nisn;
        $this->alamat = $alamat;
        $this->id_line = $id_line;
        $this->id_facebook = $id_facebook;
        $this->url = $url;
        $this->role = $role;
    }

    public function jsonSerialize()
    {
        return [
            "anggota_id" => $this->anggota_id,
            "nama" => $this->nama,
            "email" => $this->email,
            "nomor_telepon" => $this->nomor_telepon,
            "nisn" => $this->nisn,
            "alamat" => $this->alamat,
            "id_line" => $this->id_line,
            "id_facebook" => $this->id_facebook,
            "url" => $this->url,
            "role" => $this->role
        ];
    }
}
