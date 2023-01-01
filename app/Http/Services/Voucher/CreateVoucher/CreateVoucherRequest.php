<?php


namespace App\Http\Services\Voucher\CreateVoucher;


class CreateVoucherRequest
{
    private string $kode_voucher;
    private string $keterangan;
    private float $potongan_persen;
    private int $limit_jumlah;
    private string $tanggal_mulai;
    private string $tanggal_berakhir;
    private bool $is_active;

    /**
     * CreateVoucherRequest constructor.
     * @param string $kode_voucher
     * @param string $keterangan
     * @param float $potongan_persen
     * @param int $limit_jumlah
     * @param string $tanggal_mulai
     * @param string $tanggal_berakhir
     * @param bool $is_active
     */
    public function __construct(
        string $kode_voucher,
        string $keterangan,
        float $potongan_persen,
        int $limit_jumlah,
        string $tanggal_mulai,
        string $tanggal_berakhir,
        bool $is_active
    ) {
        $this->kode_voucher = $kode_voucher;
        $this->keterangan = $keterangan;
        $this->potongan_persen = $potongan_persen;
        $this->limit_jumlah = $limit_jumlah;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_berakhir = $tanggal_berakhir;
        $this->is_active = $is_active;
    }

    /**
     * @return string
     */
    public function getKodeVoucher(): string
    {
        return $this->kode_voucher;
    }

    /**
     * @return string
     */
    public function getKeterangan(): string
    {
        return $this->keterangan;
    }

    /**
     * @return float
     */
    public function getPotonganPersen(): float
    {
        return $this->potongan_persen;
    }

    /**
     * @return int
     */
    public function getLimitJumlah(): int
    {
        return $this->limit_jumlah;
    }

    /**
     * @return string
     */
    public function getTanggalMulai(): string
    {
        return $this->tanggal_mulai;
    }

    /**
     * @return string
     */
    public function getTanggalBerakhir(): string
    {
        return $this->tanggal_berakhir;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }
}
