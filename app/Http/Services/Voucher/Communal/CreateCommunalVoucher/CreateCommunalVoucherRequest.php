<?php


namespace App\Http\Services\Voucher\Communal\CreateCommunalVoucher;

use App\Models\User;

class CreateCommunalVoucherRequest
{
    private User $user;
    private int $jumlah_tim;

    /**
     * CreateVoucherRequest constructor.
     * @param User $user
     */
    public function __construct(User $user, int $jumlah_tim)
    {
        $this->user = $user;
        $this->jumlah_tim = $jumlah_tim;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return int
     */
    public function getJumlahTim(): int
    {
        return $this->jumlah_tim;
    }
}
