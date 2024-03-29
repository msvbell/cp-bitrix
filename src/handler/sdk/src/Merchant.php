<?php
/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

/**
 * Copyright (c) 2017 Compassplus LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk;

use Respect\Validation\Validator as v;

/**
 * Class Merchant
 *
 * @package Compassplus
 */
class Merchant
{
    /**
     * @var
     */
    private $language;
    /**
     * @var
     */
    private $merchantId;
    /**
     * @var
     */
    private $approveUrl;
    /**
     * @var
     */
    private $cancelUrl;
    /**
     * @var
     */
    private $declineUrl;

    /**
     * Merchant constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getApproveUrl()
    {
        return $this->approveUrl;
    }

    /**
     * @param mixed $approveUrl
     */
    public function setApproveUrl($approveUrl)
    {
        $this->approveUrl = $approveUrl;
    }

    /**
     * @return mixed
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @param mixed $cancelUrl
     */
    public function setCancelUrl($cancelUrl)
    {

        $this->cancelUrl = $cancelUrl;
    }

    /**
     * @return mixed
     */
    public function getDeclineUrl()
    {
        return $this->declineUrl;
    }

    /**
     * @param mixed $declineUrl
     */
    public function setDeclineUrl($declineUrl)
    {
        $this->declineUrl = $declineUrl;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        if (!empty($language)) {
            $language = strtolower($language);
            if (!v::languageCode('alpha-2')->validate($language)) {
                throw new \InvalidArgumentException('Language not in ISO 639-1 format');
            }
        }
        $this->language = $language;
    }

    /**
     * @param $url
     * @return bool
     */
    public function validateURL($url)
    {
        if (!v::url()->validate($url)) {
            throw new \InvalidArgumentException('Invalid url');
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->merchantId;
    }

    /**
     * @param mixed $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }
}
