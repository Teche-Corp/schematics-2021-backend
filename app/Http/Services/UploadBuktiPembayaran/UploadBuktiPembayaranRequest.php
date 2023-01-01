<?php


namespace App\Http\Services\UploadBuktiPembayaran;

use App\Models\User;
use Illuminate\Http\UploadedFile;

class UploadBuktiPembayaranRequest
{
    private UploadedFile $img;

    /**
     * UploadBuktiPembayaranRequest constructor.
     * @param UploadedFile $img
     */
    public function __construct(UploadedFile $img)
    {
        $this->img = $img;
    }

    /**
     * @return UploadedFile img
     */
    public function getImg()
    {
        return $this->img;
    }
}
