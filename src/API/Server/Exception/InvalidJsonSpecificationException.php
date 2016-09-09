<?php

namespace Martial\Hammock\API\Server\Exception;

class InvalidJsonSpecificationException extends \Exception
{
    public function __construct($code = 0, \Exception $previous)
    {
        $message = 'Invalid JSON specification';
        parent::__construct($message, $code, $previous);
    }
}
