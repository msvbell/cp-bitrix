<?php
/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

/**
 * Created by PhpStorm.
 * User: arevkina
 * Date: 01.11.2017
 * Time: 17:07
 */

namespace Compassplus\Sdk\Response;

/**
 * Class Reverse
 * @package Compassplus\Response
 */
class Reverse extends Response
{
    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->getInteger('OrderID');
    }

    /**
     * @return int
     */
    public function getRespCode()
    {
        return $this->getInteger('RespCode');
    }

    /**
     * @return string
     */
    public function getRespMessage()
    {
        return $this->getString('RespMessage');
    }
}
