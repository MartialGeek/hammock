<?php

namespace Martial\Hammock\API\Server\Request;

interface ReplicationRequestInterface
{
    /**
     * @return bool
     */
    public function isCancelled();

    /**
     * @return bool
     */
    public function isContinuous();

    /**
     * @return bool
     */
    public function mustCreateTarget();

    /**
     * @return string[]
     */
    public function getDocumentIds();

    /**
     * @return string
     */
    public function getProxy();

    /**
     * @return string
     */
    public function getSource();

    /**
     * @return string
     */
    public function getTarget();
}
