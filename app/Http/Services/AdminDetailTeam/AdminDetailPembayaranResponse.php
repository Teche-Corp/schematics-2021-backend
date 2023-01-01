<?php

namespace App\Http\Services\AdminDetailTeam;

use JsonSerializable;

class AdminDetailPembayaranResponse implements JsonSerializable
{
    private int $id;
    private int $jumlah;
    private string $sumber;
    private ?string $voucher;
    private ?string $url;
    private bool $verified;
    private ?string $keterangan;
    private bool $need_edit;

    public function __construct(
        int $id,
        int $jumlah,
        string $sumber,
        ?string $voucher,
        ?string $url,
        bool $verified,
        ?string $keterangan,
        bool $need_edit
    )
    {
        $this->id = $id;
        $this->jumlah = $jumlah;
        $this->sumber = $sumber;
        $this->voucher = $voucher;
        $this->url = $url;
        $this->verified = $verified;
        $this->keterangan = $keterangan;
        $this->need_edit = $need_edit;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "jumlah" => $this->jumlah,
            "sumber" => $this->sumber,
            "voucher" => $this->voucher,
            "url" => $this->url,
            "verified" => $this->verified,
            "keterangan" => $this->keterangan,
            "need_edit" => $this->need_edit
        ];
    }
}
