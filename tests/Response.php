<?php

namespace Martial\Hammock\Test;

use Mockery as m;
use Psr\Http\Message\StreamInterface;

class Response
{
    /**
     * @var m\MockInterface
     */
    private $response;

    public function __construct(m\MockInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return Stream
     */
    public function getBody()
    {
        $stream = m::mock(StreamInterface::class);

        $this
            ->response
            ->shouldReceive('getBody')
            ->once()
            ->andReturn($stream);

        return new Stream($stream);
    }
}
