<?php


namespace App\Http\Services\UploadBuktiPembayaran;


use App\Exceptions\SchematicsException;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UploadBuktiPembayaranService
{
    public function execute(UploadBuktiPembayaranRequest $request)
    {
        $img = $request->getImg();

        Validator::validate(
            [ 'img' => $img ],
            [ 'img' => 'image|max:1024' ]
        );

        $imgExtension = $img->guessExtension();
        $filename = 'bukti-bayar-nlc.'.Str::random(32).'.'.Str::uuid()->toString().(($imgExtension == '') ? '' : '.' . $imgExtension); // TODO tempel sesuatu untuk track siapa yang upload
        $saveStatus = Storage::disk('public')->put('nlc/bukti_pembayaran/'.$filename, file_get_contents($img));

        if (!$saveStatus) {
            throw new SchematicsException("Gagal menyimpan file", 1); // TODO masukkin ke config error
        }

        return new UploadBuktiPembayaranResponse(Storage::disk('public')->url('nlc/bukti_pembayaran/'.$filename));
    }
}
