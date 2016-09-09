<?php

namespace Martial\Hammock\API\Server;

use Martial\Hammock\API\Server\Exception\AdministratorPrivilegesRequiredException;
use Martial\Hammock\API\Server\Exception\BadContentTypeRequestException;
use Martial\Hammock\API\Server\Exception\InvalidJsonDataException;
use Martial\Hammock\API\Server\Exception\InvalidJsonSpecificationException;
use Martial\Hammock\API\Server\Request\ReplicationRequestInterface;
use Martial\Hammock\API\Server\Response\ReplicationResponseInterface;
use Martial\Hammock\API\Server\VO\DatabaseEventVOInterface;
use Martial\Hammock\API\Server\VO\DatabaseVOInterface;
use Martial\Hammock\API\Server\VO\RootDataVOInterface;
use Martial\Hammock\API\Server\VO\ServerStatisticsVOInterface;
use Martial\Hammock\API\Server\VO\TaskVOInterface;
use Psr\Http\Message\StreamInterface;

interface ServerInterface
{
    /**
     * @return RootDataVOInterface
     */
    public function getRootData();

    /**
     * @return TaskVOInterface[]
     * @throws AdministratorPrivilegesRequiredException
     */
    public function getActiveTasks();

    /**
     * @return DatabaseVOInterface[]
     */
    public function getAllDatabases();

    /**
     * @param string $feed
     * @param int $timeout
     * @param bool $heartBeat
     * @return DatabaseEventVOInterface[]
     * @throws AdministratorPrivilegesRequiredException
     */
    public function getDatabaseUpdates(
        $feed = DatabaseEventVOInterface::FEED_LONG_POLL,
        $timeout = 60,
        $heartBeat = true
    );

    /**
     * @param int $bytes
     * @param int $offset
     * @return StreamInterface
     * @throws AdministratorPrivilegesRequiredException
     */
    public function getLog($bytes = 1000, $offset = 0);

    /**
     * @param ReplicationRequestInterface $request
     * @return ReplicationResponseInterface
     * @throws AdministratorPrivilegesRequiredException
     * @throws InvalidJsonDataException
     * @throws InvalidJsonSpecificationException
     */
    public function replicate(ReplicationRequestInterface $request);

    /**
     * @return bool
     * @throws AdministratorPrivilegesRequiredException
     * @throws BadContentTypeRequestException
     */
    public function restart();

    /**
     * @return ServerStatisticsVOInterface[]
     */
    public function getAllStatistics();

    /**
     * @param string $section
     * @return ServerStatisticsVOInterface
     */
    public function getSectionStatistics($section);

    /**
     * @param int $count
     * @return string[]
     */
    public function getUuids($count = 1);
}
