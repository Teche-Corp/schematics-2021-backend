<?php


namespace App\Http\Services\CreateBuktiBayar;

use App\Models\User;
use Illuminate\Http\UploadedFile;

class CreateBuktiBayarRequest
{
    private $team_id;
    private $jumlah;
    private string $sumber;
    private UploadedFile $img;
    private User $user;
    // belum tau digenerate siapa, jaga-jaga buat dulu

    public function __construct($team_id, $jumlah, string $sumber, UploadedFile $img, \App\Models\User $user)
    {
        $this->team_id = $team_id;
        $this->jumlah = $jumlah;
        $this->sumber = $sumber;
        $this->img = $img;
        $this->user = $user;
    }

    public function getTeamId()
    {
        return $this->team_id;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function getSumber(): string
    {
        return $this->sumber;
    }

    public function getImg(): UploadedFile
    {
        return $this->img;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }


}
