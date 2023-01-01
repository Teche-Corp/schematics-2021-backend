<?php


namespace App\Http\Services\Voucher\ListVoucher;


use App\Models\Voucher;

class ListVoucherService
{
    public function execute()
	{
		$vouchers = Voucher::all()->sortBy('kode_voucher');
		$response = [];
		foreach ($vouchers as $voucher) {
			$response[] = new ListVoucherResponse(
				$voucher->kode_voucher,
				$voucher->keterangan,
				$voucher->potongan_persen,
				$voucher->limit_jumlah,
				$voucher->tanggal_mulai,
				$voucher->tanggal_berakhir,
				$voucher->is_active,
            );
        }

        return $response;
    }
}
