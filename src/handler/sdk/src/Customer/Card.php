<?php
/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Customer;

use InvalidArgumentException;
use LengthException;
use UnexpectedValueException;
use function is_numeric;
use function strlen;

/**
 * Class Card
 *
 * @package Compassplus\Customer
 */
class Card
{
    /**
     * @var
     */
    private $pan;
    /** @var  string */
    private $expireMonth;
    /** @var  string */
    private $expyear;
    /** @var  string */
    private $brand;
    /** @var  string */
    private $cardUID;

    /**
     * Card constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getPan()
    {
        return $this->pan;
    }

    /**
     * @param string $pan
     */
    public function setPan($pan)
    {
        $this->pan = $pan;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCardUID()
    {
        return $this->cardUID;
    }

    /**
     * @param mixed $cardUID
     */
    public function setCardUID($cardUID)
    {
        $this->cardUID = $cardUID;
    }

    /**
     * @return string
     */
    public function getExpDate()
    {
        return $this->expyear . $this->expireMonth;
    }

    /**
     * @return string
     */
    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    /**
     * @param string $expireMonth
     */
    public function setExpireMonth($expireMonth)
    {
        if (!is_numeric($expireMonth)) {
            throw new InvalidArgumentException('Invalid month');
        }
        if ($expireMonth > 12 or $expireMonth == 0) {
            throw new UnexpectedValueException('Invalid month');
        }
        $this->expireMonth = $expireMonth;
    }

    /**
     * @param integer $expireYear
     */
    public function setExpireYear($expireYear)
    {
        if (!is_numeric($expireYear)) {
            throw new InvalidArgumentException('Invalid card expiration year');
        }
        if ($expireYear < date("Y") or $expireYear > (date("Y") + 10)) {
            throw new UnexpectedValueException('Invalid card expiration year');
        }

        $this->expyear = $expireYear;
    }

    /**
     * @return string
     */
    public function getExpireYear()
    {
        return $this->expyear;
    }

    /**
     * @param $pan
     * @return bool
     */
    public function validatePan($pan)
    {
        if (strlen($pan) < 16 or strlen($pan) > 19) {
            throw new LengthException('Invalid pan length');
        }
        if (!is_numeric($pan)) {
            throw new InvalidArgumentException('Invalid type');
        }
        return true;
    }
}
