<?php

namespace App\Http\Services\AdminTeamTable;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use JsonSerializable;

class AdminTeamTableResponse implements JsonSerializable
{
    private int $total_page;
    private int $current_page;
    private int $item_per_page;
    private int $item_total;
    private array $teams;


    /**
     * Untuk teams, per team ada:
     * Tabel isian kolom region, nama tim, verified (yes/no),
     * sekolah, kota, provinsi, ketua (isian langsung nama, email, no telepon, ID Line)
     * 
     * @param int $total_page
     * @param int $current_page
     * @param array $teams
     */
    public function __construct(int $total_page, int $current_page, array $teams, int $item_per_page, int $item_total)
    {
        $this->total_page = $total_page;
        $this->current_page = $current_page;
        $this->item_per_page = $item_per_page;
        $this->item_total = $item_total;
        $this->teams = $teams;
    }

    public function jsonSerialize()
    {
        return [
            'total_page' => $this->total_page,
            'current_page' => $this->current_page,
            'item_per_page' => $this->item_per_page,
            'item_total' => $this->item_total,
            'teams' => $this->teams
        ];
    }
}