<?php


namespace App\Http\Services\REEVA\GetNameData;


use DateTime;
use JsonSerializable;

class GetNameDataResponse implements JsonSerializable
{
    private int $id;
    private string $name;
    private DateTime $created_at;

    /**
     * GetNameDataResponse constructor.
     * @param int $id
     * @param string $name
     * @param DateTime $created_at
     */
    public function __construct(int $id, string $name, DateTime $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "created_at" => $this->created_at->format('d/M/Y')
        ];
    }
}
