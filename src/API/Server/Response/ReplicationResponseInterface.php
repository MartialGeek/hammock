<?php

namespace Martial\Hammock\API\Server\Response;

use Martial\Hammock\API\Server\VO\HistoryItemVOInterface;

interface ReplicationResponseInterface
{
    /**
     * @return HistoryItemVOInterface[]
     */
    public function getHistory();

    /**
     * @return bool
     */
    public function isOk();

    /**
     * @return int
     */
    public function getReplicationIdVersion();

    /**
     * @return string
     */
    public function getSessionId();

    /**
     * @return int
     */
    public function getSourceLastSequence();
}