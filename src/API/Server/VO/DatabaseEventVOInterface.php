<?php

namespace Martial\Hammock\API\Server\VO;

interface DatabaseEventVOInterface
{
    const FEED_LONG_POLL = 'longpoll';
    const FEED_CONTINUOUS = 'continuous';
    const FEED_EVENT_SOURCE = 'eventsource';

    const TYPE_CREATED = 'created';
    const TYPE_UPDATED = 'updated';
    const TYPE_DELETED = 'deleted';

    /**
     * @return DatabaseVOInterface
     */
    public function getDatabase();

    /**
     * @return bool
     */
    public function isOk();

    /**
     * @return string
     */
    public function getType();
}
