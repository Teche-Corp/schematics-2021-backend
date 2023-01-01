<?php


namespace App\Http\Services\AdminUpdateTeam;


use App\Exceptions\SchematicsException;
use App\Models\Anggota;
use App\Models\User;
use JsonSerializable;

class InputAnggotaRequest implements JsonSerializable
{
    private Anggota $anggota_model;
    private User $user_model;
    private ?string $nama;
    private ?string $email;
    private ?string $telp;
    private ?string $nisn;
    private ?string $alamat;
    private ?string $line;
    private ?string $facebook;
    private string $role;

    /**
     * InputAnggotaRequest constructor.
     * @param Anggota $anggota_model
     * @param User $user_model
     * @param string|null $nama
     * @param string|null $email
     * @param string|null $telp
     * @param string|null $nisn
     * @param string|null $alamat
     * @param string|null $line
     * @param string|null $facebook
     * @param string $role
     */
    public function __construct(
        Anggota $anggota_model,
        User $user_model,
        ?string $nama,
        ?string $email,
        ?string $telp,
        ?string $nisn,
        ?string $alamat,
        ?string $line,
        ?string $facebook,
        string $role)
    {
        $this->anggota_model = $anggota_model;
        $this->user_model = $user_model;
        $this->nama = $nama;
        $this->email = $email;
        $this->telp = $telp;
        $this->nisn = $nisn;
        $this->alamat = $alamat;
        $this->line = $line;
        $this->facebook = $facebook;
        $this->role = $role;
    }

    public function updateAll(): void
    {
        $this->setAlamat();
        $this->setEmail();
        $this->setLine();
        $this->setFacebook();
        $this->setNama();
        $this->setNisn();
        $this->setTelp();
        $this->anggota_model->save();
        $this->user_model->save();
    }

    /**
     * @param void
     */
    public function setNama(): void
    {
        if ($this->nama && $this->user_model->name != $this->nama)
            $this->user_model->name = $this->nama;
        else
            $this->nama = $this->user_model->name;
    }

    /**
     * @param void
     */
    public function setEmail(): void
    {
        if ($this->email && $this->user_model->email != $this->email) {
            if ($this->user_model::where('email', $this->email)->exists()) {
                throw new SchematicsException('Email ' . $this->email . '  sudah pernah digunakan', 1024);
            }
            $this->user_model->email = $this->email;
        } else
            $this->email = $this->user_model->email;
    }

    /**
     * @param void
     */
    public function setTelp(): void
    {
        if ($this->telp && $this->user_model->phone != $this->telp)
            $this->user_model->phone = $this->telp;
        else
            $this->telp = $this->user_model->phone;
    }

    /**
     * @param void
     */
    public function setNisn(): void
    {
        if ($this->nisn && $this->anggota_model->anggota_nisn != $this->nisn)
            $this->anggota_model->anggota_nisn = $this->nisn;
        else
            $this->nisn = $this->anggota_model->anggota_nisn;
    }

    /**
     * @param void
     */
    public function setAlamat(): void
    {
        if ($this->alamat && $this->anggota_model->anggota_alamat != $this->alamat)
            $this->anggota_model->anggota_alamat = $this->alamat;
        else
            $this->alamat = $this->anggota_model->anggota_alamat;
    }

    /**
     * @param void
     */
    public function setLine(): void
    {
        if ($this->anggota_model->anggota_id_line != $this->line)
            $this->anggota_model->anggota_id_line = $this->line;
        else
            $this->line = $this->anggota_model->anggota_id_line;
    }

    /**
     * @param void
     */
    public function setFacebook(): void
    {
        if ($this->anggota_model->anggota_id_facebook != $this->facebook)
            $this->anggota_model->anggota_id_facebook = $this->facebook;
        else
            $this->facebook = $this->anggota_model->anggota_id_facebook;
    }

    /**
     * @return Anggota
     */
    public function getAnggotaModel(): Anggota
    {
        return $this->anggota_model;
    }

    /**
     * @return User
     */
    public function getUserModel(): User
    {
        return $this->user_model;
    }

    /**
     * @return string|null
     */
    public function getNama(): ?string
    {
        return $this->nama;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getTelp(): ?string
    {
        return $this->telp;
    }

    /**
     * @return string|null
     */
    public function getNisn(): ?string
    {
        return $this->nisn;
    }

    /**
     * @return string|null
     */
    public function getAlamat(): ?string
    {
        return $this->alamat;
    }

    /**
     * @return string|null
     */
    public function getLine(): ?string
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    public function jsonSerialize()
    {
        return [
            "anggota_id" => $this->anggota_model->anggota_id,
            "nama" => $this->nama,
            "email" => $this->email,
            "nomor_telepon" => $this->telp,
            "nisn" => $this->nisn,
            "alamat" => $this->alamat,
            "id_line" => $this->line,
            "id_facebook" => $this->facebook,
            "role" => $this->role
        ];
    }
}
