<?php

namespace Martial\Hammock\API\Server;

use GuzzleHttp\ClientInterface;
use Martial\Hammock\API\Security\AuthenticatedRequestFactoryInterface;
use Martial\Hammock\API\Security\AuthenticationTokenInterface;
use Martial\Hammock\API\Server\Request\ReplicationRequestInterface;

class Server implements ServerInterface
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var AuthenticatedRequestFactoryInterface
     */
    private $authenticatedRequestFactory;

    public function __construct(
        ClientInterface $httpClient,
        AuthenticatedRequestFactoryInterface $authenticatedRequestFactory
    ) {
        $this->httpClient = $httpClient;
        $this->authenticatedRequestFactory = $authenticatedRequestFactory;
    }

    /**
     * @inheritdoc
     */
    public function getRootData()
    {
        return $this
            ->httpClient
            ->request('GET', '/')
            ->getBody()
            ->getContents();
    }

    /**
     * @inheritDoc
     */
    public function getActiveTasks(AuthenticationTokenInterface $authenticationToken)
    {
        $request = $this
            ->authenticatedRequestFactory
            ->create($authenticationToken, 'GET', '/_active_tasks');

        return $this
            ->httpClient
            ->send($request)
            ->getBody()
            ->getContents();
    }

    /**
     * @inheritdoc
     */
    public function getAllDatabases()
    {
        // TODO: Implement getAllDatabases() method.
    }

    /**
     * @inheritdoc
     */
    public function getDatabaseUpdates(
        AuthenticationTokenInterface $authenticationToken,
        $feed = 'longpoll',
        $timeout = 60,
        $heartBeat = true
    ) {
        // TODO: Implement getDatabaseUpdates() method.
    }

    /**
     * @inheritdoc
     */
    public function getLog(AuthenticationTokenInterface $authenticationToken, $bytes = 1000, $offset = 0)
    {
        // TODO: Implement getLog() method.
    }

    /**
     * @inheritdoc
     */
    public function replicate(AuthenticationTokenInterface $authenticationToken, ReplicationRequestInterface $request)
    {
        // TODO: Implement replicate() method.
    }

    /**
     * @inheritdoc
     */
    public function restart(AuthenticationTokenInterface $authenticationToken)
    {
        // TODO: Implement restart() method.
    }

    /**
     * @inheritdoc
     */
    public function getAllStatistics()
    {
        // TODO: Implement getAllStatistics() method.
    }

    /**
     * @inheritdoc
     */
    public function getSectionStatistics($section)
    {
        // TODO: Implement getSectionStatistics() method.
    }

    /**
     * @inheritdoc
     */
    public function getUuids($count = 1)
    {
        // TODO: Implement getUuids() method.
    }
}
