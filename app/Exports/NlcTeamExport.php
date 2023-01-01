<?php

namespace App\Exports;

use App\Models\Team;
use App\Models\TeamEventEnum;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class NlcTeamExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Team::where('event', TeamEventEnum::NLC)->with('kota', 'anggota', 'anggotaKetua:anggota_id,team_id,user_id', 'userKetua', 'buktiPembayaran')->get();
    }

    /**
     * ! param di fungsi jangan ditambah tipe, nanti tidak
     * ! kompatibel dengan interface
     * 
     * @param Team $team
     *
     * @return array
     */
    public function map($team): array
    {
        // dd($team->anggota[0]);
        $result = [
            $team->team_id,
            $team->team_name,
            $team->team_institusi,
            $team->event,
            $team->kota->province_name,
            $team->kota->regency_name,
            $team->kota->region_name,
        ];

        if ($team->buktiPembayaran) {
            array_push(
                $result,
                $team->buktiPembayaran->bukti_bayar_jumlah,
                $team->buktiPembayaran->bukti_bayar_sumber,
                $team->buktiPembayaran->bukti_bayar_kode_voucher,
                $team->buktiPembayaran->bukti_bayar_url,
                $team->buktiPembayaran->is_verified,
                $team->buktiPembayaran->bukti_bayar_keterangan,
                $team->buktiPembayaran->bukti_bayar_need_edit,
            );
        } else {
            array_push(
                $result,
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
            );
        }

        $anggota = $team->anggota->toArray();
        for ($i=0; $i < 2; $i++) { 
            if (array_key_exists($i, $anggota)) {
                array_push(
                    $result,
                    $team->anggota[$i]->anggota_id,
                    $team->anggota[$i]->team_id,
                    $team->anggota[$i]->user_id,
                    $team->anggota[$i]->anggota_nisn,
                    $team->anggota[$i]->anggota_alamat,
                    $team->anggota[$i]->anggota_id_line,
                    $team->anggota[$i]->anggota_id_facebook,
                );
            } else {
                array_push(
                    $result,
                    '-',
                    '-',
                    '-',
                    '-',
                    '-',
                    '-',
                    '-',
                );
            }
        }

        if ($team->anggotaKetua) {
            array_push(
                $result,
                $team->anggotaKetua->anggota_id,
            );
        } else {
            array_push(
                $result,
                '-',
            );
        }

        if ($team->userKetua) {
            array_push(
                $result,
                $team->userKetua->id,
                $team->userKetua->name,
                $team->userKetua->email,
                $team->userKetua->phone,
            );
        } else {
            array_push(
                $result,
                '-',
                '-',
                '-',
                '-',
            );
        }

        array_push(
            $result,
            $team->kota_id,
            $team->ketua_id,
            $team->status_id,
            $team->tahapan_id,
        );

        if ($team->buktiPembayaran) {
            array_push(
                $result,
                $team->bukti_bayar_id,
            );
        } else {
            array_push(
                $result,
                '-',
            );
        }

        array_push(
            $result,
            $team->kota->province_id,
            $team->kota->region_id,
            $team->created_at,
            $team->updated_at ?? '-',
        );

        return $result;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'team_id',
            'team_name',
            'team_institusi',
            'event',
            'province_name',
            'regency_name',
            'region_name',
            'bukti_bayar_jumlah',
            'bukti_bayar_sumber',
            'bukti_bayar_kode_voucher',
            'bukti_bayar_url',
            'is_verified',
            'bukti_bayar_keterangan',
            'bukti_bayar_need_edit',
            'anggota_id_1',
            'team_id_1',
            'user_id_1',
            'anggota_nisn_1',
            'anggota_alamat_1',
            'anggota_id_line_1',
            'anggota_id_facebook_1',
            'anggota_id_2',
            'team_id_2',
            'user_id_2',
            'anggota_nisn_2',
            'anggota_alamat_2',
            'anggota_id_line_2',
            'anggota_id_facebook_2',
            'ketua_anggota_id',
            'ketua_user_id',
            'ketua_name',
            'ketua_email',
            'ketua_phone',
            'kota_id',
            'ketua_id',
            'status_id',
            'tahapan_id',
            'bukti_bayar_id',
            'province_id',
            'region_id',
            'team_created_at',
            'team_updated_at',
        ];
    }

    /**
     * Bind value to a cell.
     *
     * @param Cell $cell Cell to bind value to
     * @param mixed $value Value to bind in cell
     *
     * @return bool
     */
    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }
}
