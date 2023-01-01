<?php

namespace Database\Seeders;

use App\Models\Voucher;
use DateInterval;
use DateTime;
use Illuminate\Database\Seeder;

class VoucherDevSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        $future = (new DateTime())->add(new DateInterval("P10M"));

        $pastPerfect = (new DateTime())->sub(new DateInterval("P11M"));
        $past = (new DateTime())->sub(new DateInterval("P10M"));

        $vouchers = [
            ['DEV001', 'Test dev aktif, maks 10 team', 0.05, 10, $now, $future, true],
            ['DEV002', 'Test dev non-aktif, maks 10 team', 0.06, 10, $now, $future, false],
            ['DEV003', 'Test dev aktif, team sudah penuh', 0.1, 0, $now, $future, true],
            ['DEV004', 'Test dev aktif, kadaluarsa', 0.1, 0, $pastPerfect, $past, true],
            ['DEV005', 'Test dev non aktif, kadaluarsa', 0.7, 0, $pastPerfect, $past, false],
        ];

        foreach($vouchers as $v) {
            Voucher::create([
                'kode_voucher' => $v[0],
                'keterangan' => $v[1],
                'potongan_persen' => $v[2],
                'limit_jumlah' => $v[3],
                'tanggal_mulai' => $v[4],
                'tanggal_berakhir' => $v[5],
                'is_active' => $v[6],
            ]);
        }
    }
}
