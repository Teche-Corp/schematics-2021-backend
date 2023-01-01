<?php


namespace App\Http\Services\ListPeserta;


use App\Models\Region;

class AnggotaUserBuilder
{
    private $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $nisn;
    private string $alamat;
    private string $id_line;
    private string $id_facebook;

    public function __construct(Object $anggota, Object $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->nisn = $anggota->anggota_nisn;
        $this->alamat = $anggota->anggota_alamat;
        $this->id_line = $anggota->anggota_id_line;
        $this->id_facebook = $anggota->anggota_id_facebook;
    }

    public function build()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'nisn' => $this->nisn,
            'alamat' => $this->alamat,
            'id_line' => $this->id_line,
            'id_facebook' => $this->id_facebook
        ];
    }
}