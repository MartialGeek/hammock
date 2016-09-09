<?php

namespace Martial\Hammock\API\Server\VO;

interface TaskVOInterface
{
    const TYPE_INDEXER = 'indexer';
    const TYPE_DATABASE_COMPACTION = 'database_compaction';
    const TYPE_REPLICATION = 'replication';

    /**
     * @return int
     */
    public function getChangesDone();

    /**
     * @return string
     */
    public function getDatabase();

    /**
     * @return string
     */
    public function getPID();

    /**
     * @return int
     */
    public function getProgress();

    /**
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * @return \DateTime
     */
    public function getUpdateDate();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getType();
}
