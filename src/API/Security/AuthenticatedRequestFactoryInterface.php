<?php

namespace Martial\Hammock\API\Security;

use Psr\Http\Message\RequestInterface;

interface AuthenticatedRequestFactoryInterface
{
    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return RequestInterface
     */
    public function create(AuthenticationTokenInterface $authenticationToken, $method, $uri, array $options = []);
}
