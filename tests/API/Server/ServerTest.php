<?php

namespace Martial\Hammock\Test;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Martial\Hammock\API\Security\AuthenticatedRequestFactoryInterface;
use Martial\Hammock\API\Security\AuthenticationTokenInterface;
use Martial\Hammock\API\Server\Server;
use Mockery as m;
use Psr\Http\Message\RequestInterface;

class ServerTest extends m\Adapter\Phpunit\MockeryTestCase
{
    use HttpClientTrait;

    /**
     * @var Server
     */
    private $server;

    /**
     * @var m\MockInterface
     */
    private $httpClient;

    /**
     * @var m\MockInterface
     */
    private $authenticatedRequestFactory;

    protected function setUp()
    {
        $this->httpClient = m::mock(ClientInterface::class);
        $this->authenticatedRequestFactory = m::mock(AuthenticatedRequestFactoryInterface::class);
        $this->server = new Server($this->httpClient, $this->authenticatedRequestFactory);
    }

    protected function getHttpClient()
    {
        return $this->httpClient;
    }

    public function testGetRootDataShouldReturnARootDataVO()
    {
        $json = file_get_contents(__DIR__ . '/root-data.json');

        $this
            ->request('GET', '/')
            ->getBody()
            ->getContents()
            ->andReturn($json);

        $this->assertSame($json, $this->server->getRootData());
    }

    public function testGetActiveTasksShouldReturnAListOfTaskVo()
    {
        $authenticationToken = m::mock(AuthenticationTokenInterface::class);
        $json = file_get_contents(__DIR__ . '/active-tasks.json');
        $request = $this->buildActiveTasksRequest($authenticationToken);

        $this
            ->send($request)
            ->getBody()
            ->getContents()
            ->andReturn($json);

        $this->assertSame($json, $this->server->getActiveTasks($authenticationToken));
    }

    public function testGetActiveTasksShouldThrowAnExceptionWhenTheUserIsNotAuthenticated()
    {
        $authenticationToken = m::mock(AuthenticationTokenInterface::class);
        $clientException = m::mock(ClientException::class);
        $request = $this->buildActiveTasksRequest($authenticationToken);

        $this
            ->httpClient
            ->shouldReceive('send')
            ->once()
            ->with($request)
            ->andThrow($clientException);

        $this->expectException(ClientException::class);
        $this->server->getActiveTasks($authenticationToken);
    }

    /**
     * @param m\MockInterface $authenticationToken
     * @return m\MockInterface
     */
    private function buildActiveTasksRequest(m\MockInterface $authenticationToken)
    {
        $request = m::mock(RequestInterface::class);

        $this
            ->authenticatedRequestFactory
            ->shouldReceive('create')
            ->once()
            ->with($authenticationToken, 'GET', '/_active_tasks')
            ->andReturn($request);

        return $request;
    }
}
