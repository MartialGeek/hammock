<?php

namespace Martial\Hammock\API\Server\VO;

interface RootDataVOInterface
{
    /**
     * @return string
     */
    public function getWelcomeMessage();

    /**
     * @return string
     */
    public function getUuid();

    /**
     * @return VendorVOInterface
     */
    public function getVendor();

    /**
     * @return string
     */
    public function getVersion();
}
