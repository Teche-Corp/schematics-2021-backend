<?php


namespace App\Http\Services\Voucher\ListVoucher;


use JsonSerializable;

class ListVoucherResponse implements JsonSerializable
{
    private string $kode_voucher;
    private string $keterangan;
    private float $potongan_persen;
    private int $limit_jumlah;
    private string $tanggal_mulai;
    private string $tanggal_berakhir;
    private bool $is_active;

    /**
     * ListVoucherResponse constructor.
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

    public function jsonSerialize(): array
    {
        return [
            'kode_voucher' => $this->kode_voucher,
            'keterangan' => $this->keterangan,
            'potongan_persen' => $this->potongan_persen,
            'limit_jumlah' => $this->limit_jumlah,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            'is_active' => $this->is_active
        ];
    }
}
