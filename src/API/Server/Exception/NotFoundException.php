<?php

namespace Martial\Hammock\API\Server\Exception;

class NotFoundException extends \Exception
{
    public function __construct($code = 0, \Exception $previous)
    {
        $message = 'Resource not found';
        parent::__construct($message, $code, $previous);
    }
}
