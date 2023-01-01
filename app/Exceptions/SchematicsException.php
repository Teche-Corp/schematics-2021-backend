<?php


namespace App\Exceptions;

use Exception;
use Throwable;

class SchematicsException extends Exception
{
    public static function build (string $error_key): SchematicsException
    {
        return new self(
            config('error.msg.' . $error_key),
            config('error.code.' . $error_key)
        );
    }

    public function __construct(string $message, int $code, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
