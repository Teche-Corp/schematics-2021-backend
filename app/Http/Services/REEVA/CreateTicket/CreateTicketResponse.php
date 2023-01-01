<?php

namespace App\Http\Services\REEVA\CreateTicket;

use JsonSerializable;

class CreateTicketResponse implements JsonSerializable
{
    private int $id;
    private int $user_id;
    private string $created_at;

    /**
     * @param int $id
     * @param int $user_id
     * @param string $created_at
     */
    public function __construct(int $id, int $user_id, string $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at
        ];
    }
}