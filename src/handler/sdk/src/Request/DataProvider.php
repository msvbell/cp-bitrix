<?php
/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request;

/**
 * Class DataProvider
 *
 * @package Compassplus\DataProvider
 */
abstract class DataProvider
{
    /**
     * @var \Compassplus\Sdk\Operation\Operation
     */
    protected $operation;

    /**
     * DataProvider constructor.
     *
     * @param \Compassplus\Sdk\Operation\Operation $operation
     */
    public function __construct(\Compassplus\Sdk\Operation\Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return mixed
     */
    abstract public function getRequestData();
}
