<?php
/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

return array(
    'format' => \Compassplus\Sdk\Config\Config::XML,
    'testing' => true,
    'PROD' => array(
        'hostname' => 'api.skytecrussia.com',
        'port' => '443'
    ),
    'TEST' => array(
        'hostname' => '192.168.50.11',
        'port' => '9009'
    )
);
