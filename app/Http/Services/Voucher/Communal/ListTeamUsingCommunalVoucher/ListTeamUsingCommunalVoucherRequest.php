<?php

namespace App\Http\Services\Voucher\Communal\ListTeamUsingCommunalVoucher;

use App\Models\User;

class ListTeamUsingCommunalVoucherRequest
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}