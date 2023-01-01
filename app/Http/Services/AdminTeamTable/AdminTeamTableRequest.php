<?php

namespace App\Http\Services\AdminTeamTable;

class AdminTeamTableRequest
{
    private ?int $page;
    private ?string $search;
    private ?array $order_by;
    private string $event;

    public function __construct(?int $page, ?string $search, ?array $order_by, string $event)
    {
        $this->page = $page;
        $this->search = $search;
        $this->order_by = $order_by;
        $this->event = $event;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getSearchQuery(): ?string
    {
        return $this->search;
    }

    public function getOrderBy(): ?array
    {
        return $this->order_by;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEventWhere(): string
    {
        if ($this->event == 'npcj') {
            return 'npc_junior';
        } else if ($this->event == 'npcs') {
            return 'npc_senior';
        }

        return $this->event;
    }
}
