<?php


namespace App\Http\Services\NPC\FindTeam;


use JsonSerializable;

class FindTeamResponse implements JsonSerializable
{
    private int $team_id;
    private string $event;
    private string $nama_tim;
    private string $asal_sekolah;
    private string $kota;
    private string $provinsi;
    private string $region;
    private string $nama_ketua;
    private string $email_ketua;
    private string $nomor_telpon;
    private string $nisn_ketua;
    private string $alamat_ketua;
    private ?string $id_line_ketua;
    private string $link_bukti_sah;
    /**
     * @var FindTeamAnggotaResponse[]
     */
    private array $anggota;
    private ?string $tahapan;
    private ?bool $pembayaran_is_verified;
	private ?FindTeamVoucherResponse $voucher;

	/**
	 * FindTeamResponse constructor.
	 * @param int $team_id
	 * @param string $nama_tim
	 * @param string $asal_sekolah
	 * @param string $kota
	 * @param string $provinsi
	 * @param string $region
	 * @param string $nama_ketua
	 * @param string $email_ketua
	 * @param string $nomor_telpon
	 * @param string $nisn_ketua
	 * @param string $alamat_ketua
	 * @param string|null $id_line_ketua
	 * @param string $link_bukti_sah
	 * @param FindTeamAnggotaResponse[] $anggota
	 * @param string|null $tahapan
	 * @param bool|null $pembayaran_is_verified
	 * @param string $event
	 * @param FindTeamVoucherResponse|null $voucher
	 */
    public function __construct(
        int $team_id,
		string $nama_tim,
		string $asal_sekolah,
		string $kota,
		string $provinsi,
		string $region,
		string $nama_ketua,
		string $email_ketua,
		string $nomor_telpon,
		string $nisn_ketua,
		string $alamat_ketua,
		?string $id_line_ketua,
		string $link_bukti_sah,
		array $anggota,
		?string $tahapan,
		?bool $pembayaran_is_verified,
		string $event,
		?FindTeamVoucherResponse $voucher
	)
    {
        $this->team_id = $team_id;
        $this->nama_tim = $nama_tim;
        $this->asal_sekolah = $asal_sekolah;
        $this->kota = $kota;
        $this->provinsi = $provinsi;
        $this->region = $region;
        $this->nama_ketua = $nama_ketua;
        $this->email_ketua = $email_ketua;
        $this->nomor_telpon = $nomor_telpon;
        $this->nisn_ketua = $nisn_ketua;
        $this->alamat_ketua = $alamat_ketua;
        $this->id_line_ketua = $id_line_ketua;
        $this->link_bukti_sah = $link_bukti_sah;
        $this->anggota = $anggota;
        $this->tahapan = $tahapan;
        $this->pembayaran_is_verified = $pembayaran_is_verified;
        $this->event = $event;
		$this->voucher = $voucher;
	}

    public function jsonSerialize(): array
	{
        return [
            "id" => $this->team_id,
            "nama_tim" => $this->nama_tim,
            "event" => $this->event,
            "asal_sekolah" => $this->asal_sekolah,
            "kota" => $this->kota,
            "provinsi" => $this->provinsi,
            "region" => $this->region,
            "nama_ketua" => $this->nama_ketua,
            "email_ketua" => $this->email_ketua,
            "nomor_telpon" => $this->nomor_telpon,
            "nisn_ketua" => $this->nisn_ketua,
            "alamat_ketua" => $this->alamat_ketua,
            "id_line_ketua" => $this->id_line_ketua ?? null,
            "link_bukti_sah" => $this->link_bukti_sah,
            "anggota" => $this->anggota,
            "tahapan" => $this->tahapan,
            "status_pembayaran" => $this->pembayaran_is_verified,
			"voucher" => $this->voucher ?? null,
        ];
    }
}
