<?php


namespace App\Models;


use App\Exceptions\SchematicsException;
use ReflectionClass;

abstract class SchematicsEnum
{
    protected $value;

    /**
     * SimplusEnum constructor.
     * @param $value
     * @throws SchematicsException
     */
    public function __construct($value)
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getConstants() as $key => $val) {
            if ($value == $val) {
                $this->value = $value;
            }
        }

        if (!isset($this->value)) {
            throw $this->onErrorException();
        }
    }

    abstract protected function onErrorException(): SchematicsException;

    public function getValue()
    {
        return $this->value;
    }
}
