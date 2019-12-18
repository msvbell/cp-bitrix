<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$description = array(
    'MAIN' => 'Compassplus payment'
);

$isAvailable = \Bitrix\Sale\PaySystem\Manager::HANDLER_AVAILABLE_TRUE;

$licensePrefix = \Bitrix\Main\Loader::includeModule("bitrix24") ? \CBitrix24::getLicensePrefix() : "";
if (IsModuleInstalled("bitrix24") && !in_array($licensePrefix, ["ru"]))
{
    $isAvailable = \Bitrix\Sale\PaySystem\Manager::HANDLER_AVAILABLE_FALSE;
}

$data = array(
    'NAME' => 'Compassplus payment',
    'IS_AVAILABLE' => $isAvailable,
    'CODES' => array(
        "SALE_COMPASSPLUS_MERCHANT_ID" => array(
            "NAME" => Loc::getMessage('SALE_COMPASSPLUS_MERCHANT_ID'),
            'DESCRIPTION' => Loc::getMessage('SALE_COMPASSPLUS_MERCHANT_ID_DESC'),
            "GROUP" => "PAYMENT",
            'SORT' => 100,
            ),
        "SALE_COMPASSPLUS_ROOT_CERT" => array(
            "NAME" => Loc::getMessage('SALE_COMPASSPLUS_ROOT_CERT'),
            'DESCRIPTION' =>  Loc::getMessage('SALE_COMPASSPLUS_ROOT_CERT_DESC'),
            "GROUP" => "PAYMENT",
            'SORT' => 200
        ),
        "SALE_COMPASSPLUS_CERT" => array(
            "NAME" => Loc::getMessage('SALE_COMPASSPLUS_CERT'),
            'DESCRIPTION' =>  Loc::getMessage('SALE_COMPASSPLUS_CERT_DESC'),
            "GROUP" => "PAYMENT",
            'SORT' => 300,
            "INPUT" => array(
                "TYPE" => "FILE"
            )
        ),
        "SALE_COMPASSPLUS_KEY" => array(
            "NAME" => Loc::getMessage('SALE_COMPASSPLUS_KEY'),
            'DESCRIPTION' =>  Loc::getMessage('SALE_COMPASSPLUS_KEY_DESC'),
            "GROUP" => "PAYMENT",
            'SORT' => 400,
            "INPUT" => array(
                "TYPE" => "FILE"
            )
        )
    )
);