<?php


namespace App\Http\Services\VerifBuktiBayar;


class VerifBuktiBayarRequest
{
    private $bukti_bayar_id;
    private bool $is_verified;
    private bool $need_edit;
    private string $keterangan;
    // belum tau digenerate siapa, jaga-jaga buat dulu

    public function __construct($bukti_bayar_id, bool $is_verified, string $keterangan, bool $need_edit)
    {
        $this->bukti_bayar_id = $bukti_bayar_id;
        $this->is_verified = $is_verified;
        $this->need_edit = $need_edit;
        $this->keterangan = $keterangan;
    }

    public function getIsVerified(): bool
    {
        return $this->is_verified;
    }

    public function getNeedEdit(): bool
    {
        return $this->need_edit;
    }

    public function getKeterangan(): string
    {
        return $this->keterangan;
    }

    public function getBuktiBayarId()
    {
        return $this->bukti_bayar_id;
    }
}
