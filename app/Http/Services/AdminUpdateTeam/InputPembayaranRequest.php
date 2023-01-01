<?php


namespace App\Http\Services\AdminUpdateTeam;

use App\Models\BuktiPembayaranTim;
use JsonSerializable;

class InputPembayaranRequest implements JsonSerializable
{
    private ?BuktiPembayaranTim $pembayaran_model;
    private ?int $jumlah;
    private ?bool $verified;
    private ?string $sumber;
    private ?string $voucher;
    private ?string $detail;
    private ?bool $need_edit;

    /**
     * InputPembayaranRequest constructor.
     * @param BuktiPembayaranTim|null $pembayaran_model
     * @param int|null $jumlah
     * @param bool $verified
     * @param string|null $sumber
     * @param string|null $voucher
     * @param string|null $detail
     * @param bool $need_edit
     */
    public function __construct(
        ?BuktiPembayaranTim $pembayaran_model,
        ?int $jumlah,
        ?bool $verified,
        ?string $sumber,
        ?string $voucher,
        ?string $detail,
        ?bool $need_edit
    )
    {
        $this->pembayaran_model = $pembayaran_model;
        $this->jumlah = $jumlah;
        $this->verified = $verified;
        $this->sumber = $sumber;
        $this->voucher = $voucher;
        $this->detail = $detail;
        $this->need_edit = $need_edit;
    }

    public function updateAll(): void
    {
        if ($this->pembayaran_model) {
            $this->setDetail();
            $this->setJumlah();
            $this->setNeedEdit();
            $this->setSumber();
            $this->setVerified();
            $this->setVoucher();
            $this->pembayaran_model->save();
        }
    }

    /**
     * @param void
     */
    public function setJumlah(): void
    {
        if ($this->jumlah && $this->pembayaran_model->bukti_bayar_jumlah != $this->jumlah)
            $this->pembayaran_model->bukti_bayar_jumlah = $this->jumlah;
        else
            $this->jumlah = $this->pembayaran_model->bukti_bayar_jumlah;
    }

    /**
     * @param void
     */
    public function setVerified(): void
    {
        if (isset($this->verified) && $this->pembayaran_model->is_verified != $this->verified)
            $this->pembayaran_model->is_verified = $this->verified;
        else
            $this->verified = $this->pembayaran_model->is_verified;
    }

    /**
     * @param void
     */
    public function setSumber(): void
    {
        if ($this->sumber && $this->pembayaran_model->bukti_bayar_sumber != $this->sumber)
            $this->pembayaran_model->bukti_bayar_sumber = $this->sumber;
        else
            $this->sumber = $this->pembayaran_model->bukti_bayar_sumber;
    }

    /**
     * @param void
     */
    public function setVoucher(): void
    {
        if ($this->voucher && $this->pembayaran_model->bukti_bayar_kode_voucher != $this->voucher)
            $this->pembayaran_model->bukti_bayar_kode_voucher = $this->voucher;
        else
            $this->voucher = $this->pembayaran_model->bukti_bayar_kode_voucher;
    }

    /**
     * @param void
     */
    public function setDetail(): void
    {
        if ($this->detail && $this->pembayaran_model->bukti_bayar_keterangan != $this->detail)
            $this->pembayaran_model->bukti_bayar_keterangan = $this->detail;
        else
            $this->detail = $this->pembayaran_model->bukti_bayar_keterangan;
    }

    /**
     * @param void
     */
    public function setNeedEdit(): void
    {
        if (isset($this->need_edit) && $this->pembayaran_model->need_edit != $this->need_edit)
            $this->pembayaran_model->need_edit = $this->need_edit;
        else
            $this->need_edit = $this->pembayaran_model->need_edit;
    }

    /**
     * @return BuktiPembayaranTim|null
     */
    public function getPembayaranModel(): BuktiPembayaranTim|null
    {
        return $this->pembayaran_model ?? null;
    }

    /**
     * @return int|null
     */
    public function getJumlah(): ?int
    {
        return $this->jumlah;
    }

    /**
     * @return bool|null
     */
    public function isVerified(): ?bool
    {
        return $this->verified;
    }

    /**
     * @return string|null
     */
    public function getSumber(): ?string
    {
        return $this->sumber;
    }

    /**
     * @return string|null
     */
    public function getVoucher(): ?string
    {
        return $this->voucher;
    }

    /**
     * @return string|null
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * @return bool|null
     */
    public function isNeedEdit(): ?bool
    {
        return $this->need_edit;
    }

    public function jsonSerialize()
    {
        return $this->pembayaran_model ? [
            "id" => $this->pembayaran_model->id,
            "jumlah" => $this->jumlah,
            "sumber" => $this->sumber,
            "voucher" => $this->voucher,
            "url" => $this->pembayaran_model->bukti_bayar_url,
            "verified" => $this->verified,
            "keterangan" => $this->detail,
            "need_edit" => $this->need_edit
        ]
            : null;
    }
}
