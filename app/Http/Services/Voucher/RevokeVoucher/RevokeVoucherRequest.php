<?php

namespace App\Http\Services\Voucher\RevokeVoucher;

use App\Models\TeamEventEnum;
use App\Models\User;

class RevokeVoucherRequest
{
    private string $event;
    private User $user;
    private string $kode_voucher;

    public function __construct(string $event, User $user, string $kode_voucher)
    {
        $this->event = $event;
        $this->user = $user;
        $this->kode_voucher = $kode_voucher;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEventEnum(): string
    {
        switch ($this->event) {
            case 'nlc':
                return TeamEventEnum::NLC;
            case 'npcs':
                return TeamEventEnum::NPC_SENIOR;
            case 'npcj':
                return TeamEventEnum::NPC_JUNIOR;
            default:
                break;
        }

        return $this->event;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getKodeVoucher(): string
    {
        return $this->kode_voucher;
    }
}