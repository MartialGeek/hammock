<?php

namespace Martial\Hammock\API\Security;

interface AuthenticationStrategyInterface
{
    const BASIC = 'basic';
    const COOKIE = 'cookie';
    const OAUTH = 'oauth';
}
