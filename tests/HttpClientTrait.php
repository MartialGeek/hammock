<?php

namespace Martial\Hammock\Test;

use Mockery as m;
use Psr\Http\Message\ResponseInterface;

trait HttpClientTrait
{
    /**
     * @return m\MockInterface
     */
    abstract protected function getHttpClient();

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return Response
     */
    private function request($method, $uri, array $options = [])
    {
        $response = m::mock(ResponseInterface::class);

        $this
            ->getHttpClient()
            ->shouldReceive('request')
            ->once()
            ->withArgs($this->getRequestArguments($method, $uri, $options))
            ->andReturn($response);

        return new Response($response);
    }

    /**
     * @param m\MockInterface $request
     * @param array $options
     * @return Response
     */
    private function send(m\MockInterface $request, $options = [])
    {
        $response = m::mock(ResponseInterface::class);

        $args = [$request];

        if (!empty($options)) {
            $args[] = $options;
        }

        $this
            ->getHttpClient()
            ->shouldReceive('send')
            ->once()
            ->withArgs($args)
            ->andReturn($response);

        return new Response($response);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return array
     */
    private function getRequestArguments($method, $uri, array $options = [])
    {
        $args = [
            $method,
            $uri
        ];

        if (!empty($options)) {
            $args[] = $options;
        }

        return $args;
    }
}
