<?php


namespace App\Http\Services\REEVA\InsertReevaData;


class InsertReevaDataRequest
{
    private string $name;

    /**
     * InsertReevaDataRequest constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
