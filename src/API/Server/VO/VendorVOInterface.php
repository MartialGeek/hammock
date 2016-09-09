<?php
/**
 * Created by PhpStorm.
 * User: martial
 * Date: 02/09/2016
 * Time: 13:49
 */

namespace Martial\Hammock\API\Server\VO;

interface VendorVOInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getVersion();
}