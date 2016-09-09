<?php

namespace Martial\Hammock\API\Server\VO;

interface HistoryItemVOInterface
{
    /**
     * @return int
     */
    public function getDocumentWriteFailures();

    /**
     * @return int
     */
    public function getDocumentsRead();

    /**
     * @return int
     */
    public function getDocumentsWritten();

    /**
     * @return int
     */
    public function getEndLastSequence();

    /**
     * @return \DateTime
     */
    public function getEndTime();

    /**
     * @return int
     */
    public function getMissingChecked();

    /**
     * @return int
     */
    public function getMissingFound();

    /**
     * @return int
     */
    public function getRecordedSequence();

    /**
     * @return string
     */
    public function getSessionId();

    /**
     * @return int
     */
    public function getStartLastSequence();

    /**
     * @return \DateTime
     */
    public function getStartTime();
}
