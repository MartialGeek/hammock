<?php

namespace Martial\Hammock\API\Server\Exception;

class AdministratorPrivilegesRequiredException extends \Exception
{
    public function __construct($code = 0, \Exception $previous = null)
    {
        $message = 'Administrator privileges are required to perform this action';
        parent::__construct($message, $code, $previous);
    }
}
