<?php

namespace Martial\Hammock\Test;

use Mockery as m;

class Stream
{
    /**
     * @var m\MockInterface
     */
    private $stream;

    /**
     * Stream constructor.
     * @param m\MockInterface $stream
     */
    public function __construct(m\MockInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @return m\Expectation
     */
    public function getContents()
    {
        return $this
            ->stream
            ->shouldReceive('getContents')
            ->once();
    }
}
