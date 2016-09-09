<?php

namespace Martial\Hammock\API\Server\Exception;

class InvalidJsonDataException extends \Exception
{
    public function __construct($code = 0, \Exception $previous)
    {
        $message = 'Invalid JSON data';
        parent::__construct($message, $code, $previous);
    }
}
