<?php


namespace App\Http\Services\NLC\FindTeam;


use JsonSerializable;

class FindTeamTahapanResponse implements JsonSerializable
{

    private string $name;
    private string $username;
    private string $password;
    private string $status;

    /**
     * FindTeamTahapanResponse constructor.
     * @param string $name
     * @param string $username
     * @param string $password
     * @param string $status
     */
    public function __construct(string $name, string $username, string $password, string $status)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->status = $status;
    }

    /**
     * @return array<string, string>
     */
    public function jsonSerialize(): array
    {
        return [
            "nama" => $this->name,
            "username" => $this->username,
            "password" => $this->password,
            "status" => $this->status
        ];
    }
}
