<?php

namespace Martial\Hammock\API\Server;

use GuzzleHttp\Exception\ClientException;
use Martial\Hammock\API\Security\AuthenticationTokenInterface;
use Martial\Hammock\API\Server\Request\ReplicationRequestInterface;
use Psr\Http\Message\StreamInterface;

interface ServerInterface
{
    /**
     * @return string
     */
    public function getRootData();

    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @return string
     * @throws ClientException
     */
    public function getActiveTasks(AuthenticationTokenInterface $authenticationToken);

    /**
     * @return string
     */
    public function getAllDatabases();

    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @param string $feed
     * @param int $timeout
     * @param bool $heartBeat
     * @return string
     * @throws ClientException
     */
    public function getDatabaseUpdates(
        AuthenticationTokenInterface $authenticationToken,
        $feed = 'longpoll',
        $timeout = 60,
        $heartBeat = true
    );

    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @param int $bytes
     * @param int $offset
     * @return StreamInterface
     * @throws ClientException
     */
    public function getLog(AuthenticationTokenInterface $authenticationToken, $bytes = 1000, $offset = 0);

    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @param ReplicationRequestInterface $request
     * @return string
     * @throws ClientException
     */
    public function replicate(AuthenticationTokenInterface $authenticationToken, ReplicationRequestInterface $request);

    /**
     * @param AuthenticationTokenInterface $authenticationToken
     * @return bool
     * @throws ClientException
     */
    public function restart(AuthenticationTokenInterface $authenticationToken);

    /**
     * @return string
     */
    public function getAllStatistics();

    /**
     * @param string $section
     * @return string
     */
    public function getSectionStatistics($section);

    /**
     * @param int $count
     * @return string[]
     */
    public function getUuids($count = 1);
}
