<?php

namespace Martial\Hammock\API\Security;

interface AuthenticationInterface
{
    /**
     * @param AuthenticationStrategyInterface $authenticationStrategy
     * @return AuthenticationTokenInterface
     */
    public function authenticate(AuthenticationStrategyInterface $authenticationStrategy);
}
