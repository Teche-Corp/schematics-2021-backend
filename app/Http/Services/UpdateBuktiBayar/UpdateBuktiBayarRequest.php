<?php


namespace App\Http\Services\UpdateBuktiBayar;


class UpdateBuktiBayarRequest
{
    private $bukti_bayar_id;
    private $jumlah;
    private string $sumber;
    private string $url_bukti;
    // belum tau digenerate siapa, jaga-jaga buat dulu

    public function __construct($bukti_bayar_id, $jumlah, string $sumber, string $url_bukti)
    {
        $this->bukti_bayar_id = $bukti_bayar_id;
        $this->jumlah = $jumlah;
        $this->sumber = $sumber;
        $this->url_bukti = $url_bukti;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function getSumber(): string
    {
        return $this->sumber;
    }

    public function getUrlBukti(): string
    {
        return $this->url_bukti;
    }

    public function getBuktiBayarId()
    {
        return $this->bukti_bayar_id;
    }
}