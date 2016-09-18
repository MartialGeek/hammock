<?php

namespace Martial\Hammock\API\Security;

interface AuthenticationTokenInterface
{
    /**
     * @return AuthenticationStrategyInterface
     */
    public function getStrategy();

    /**
     * @return string
     */
    public function getIdentifier();
}
