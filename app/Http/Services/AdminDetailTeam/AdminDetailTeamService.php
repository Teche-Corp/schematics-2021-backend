<?php

namespace App\Http\Services\AdminDetailTeam;

use App\Exceptions\SchematicsException;
use App\Models\Anggota;
use App\Models\BuktiPembayaranTim;
use App\Models\Region;
use App\Models\Team;

class AdminDetailTeamService
{
    /**
     * @throws SchematicsException
     */
    public function execute(AdminDetailTeamRequest $request): AdminDetailTeamResponse
    {
        /** @var Team $team */
        $team = Team::where('team_id', $request->getTeamId())->first();
        if (!$team)
            throw new SchematicsException("Tim dengan id: " . $request->getTeamId() . " tidak ditemukan", 1001);
        /** @var Anggota[] $anggotas */
        $anggotas = $team->anggota()->get();

        /** @var BuktiPembayaranTim $pembayaran */
        $pembayaran = $team->buktiPembayaran;

        /** @var Region $kota */
        $kota = $team->kota()->first();

        $anggota_responses = [];
        $anggota = [];
        foreach ($anggotas as $a) {
            $anggota[] = $a;
            $user = $a->user()->first();
            $temp = new AdminDetailAnggotaResponse(
                $a->anggota_id,
                $user->name,
                $user->email,
                $user->phone,
                $a->anggota_nisn,
                $a->anggota_alamat,
                $a->anggota_id_line,
                $a->anggota_id_facebook,
                $a->file()->exists() ? $a->file()->first()->url : null,
                $a->user_id == $team->ketua_id ? 'KETUA' : 'ANGGOTA'
            );
            $anggota_responses[] = $temp;
        }
        if ($pembayaran) {
            $pembayaran_response = new AdminDetailPembayaranResponse(
                $pembayaran->id,
                $pembayaran->bukti_bayar_jumlah,
                $pembayaran->bukti_bayar_sumber,
                $pembayaran->bukti_bayar_kode_voucher,
                $pembayaran->bukti_bayar_url,
                $pembayaran->is_verified,
                $pembayaran->bukti_bayar_keterangan,
                $pembayaran->need_edit
            );
        }
        $kota_response = new AdminDetailKotaResponse(
            $kota->id,
            $kota->province_id,
            $kota->regency_name,
            $kota->province_name,
            $kota->region_id,
            $kota->region_name,
        );
        return new AdminDetailTeamResponse(
            $team,
            $anggota,
            $pembayaran ?? null,
            $kota,
            $team->team_id,
            $team->status_id,
            $team->tahapan_id,
            $team->team_name,
            $team->event,
            $team->team_institusi,
            $anggota_responses,
            $kota_response,
            $pembayaran_response ?? null
        );
    }
}
