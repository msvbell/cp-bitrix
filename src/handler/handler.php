<?php

namespace Sale\Handlers\PaySystem;

use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Error;
use Bitrix\Main\IO\File;
use Bitrix\Main\IO\FileEntry;
use Bitrix\Sale\PaySystem\IRefund;
use Bitrix\Sale\PaySystem\Manager;
use Bitrix\Sale\PaySystem\ServiceHandler;
use Bitrix\Sale\PaySystem\ServiceResult;
use Bitrix\Sale\Registry;
use Compassplus\Sdk\OrderInfo;
use Compassplus\Sdk\Payment;
use Compassplus\Sdk\Response\Order;

require_once 'autoload.php';

/**
 * Class CompassplusHandler
 *
 * Flow
 * ```php
 * <?php
 *
 * ```
 * dflkgjsdflkj
 * @todo
 * @package Sale\Handlers\PaySystem
 */
class CompassplusHandler extends ServiceHandler implements IRefund
{
    /**
     * Путь до папки с сертификатами Compassplus
     */
    const PATH_TO_CERTS = __DIR__ . DIRECTORY_SEPARATOR . 'certs';
    /**
     * Имя файла с сертификатом выданным мерчанту
     */
    const CLIENT_CRT_FILE = 'client.pem';
    /**
     * Имя файла с ключом выданным мерчанту
     */
    const CLIENT_KEY_FILE = 'client.key';

    /**
     * Инициализация платежа
     *
     * Инициализирует платёж для последующего перенаправления
     * клиента на страницу оплаты платёжной системы Compassplus
     *
     * @param \Bitrix\Sale\Payment $payment
     * @param \Bitrix\Main\Request|null $request
     * @return \Bitrix\Sale\PaySystem\ServiceResult
     * @throws \Exception
     */
    public function initiatePay(\Bitrix\Sale\Payment $payment, \Bitrix\Main\Request $request = null)
    {
        $compassplusPaymentOrder = $this->initCompassplusPaymentOrder($payment);
        try {
            $purchaseOrderResponse = $compassplusPaymentOrder->purchase();
        } catch (\Exception $e) {

        }
        $payment->setField('PS_STATUS_MESSAGE', $purchaseOrderResponse->getOrderId());
        $payment->save();

        $status = $purchaseOrderResponse->getStatus();
        $params = array(
            'URL' => $purchaseOrderResponse->getURL(),
            'SESSIONID' => $purchaseOrderResponse->getSessionID(),
            'ORDERID' => $purchaseOrderResponse->getOrderId(),
        );

        $this->setExtraParams($params);
        return $this->showTemplate($payment, "template");
    }

    /**
     * Возвращает список поддерживаемых валют
     * @return array
     */
    public function getCurrencyList()
    {
        return array('RUB');
    }

    /**
     * @param \Bitrix\Sale\Payment $paymentl
     * @param \Bitrix\Main\Request $request
     * @return \Bitrix\Sale\PaySystem\ServiceResult
     */
    public function processRequest(\Bitrix\Sale\Payment $payment, \Bitrix\Main\Request $request)
    {
        $result = new ServiceResult();
        $data = $this->getResponseXmlBody($request);
        $orderInfo = new OrderInfo($data);
        if ($orderInfo->getOrderStatus() == 'APPROVED') {
            if ($this->isCorrectSum($payment->getSum(), $orderInfo->getPurchaseAmount())) {
                $fields = array(
                    "PS_STATUS" => 'APPROVED',
                    "PS_STATUS_CODE" => $orderInfo->getResponseCode(),
                    "PS_STATUS_DESCRIPTION" => $orderInfo->getResponseDescription(),
                    "PS_SUM" => $orderInfo->getPurchaseAmount(),
                    "PS_CURRENCY" => $payment->getField('CURRENCY'),
                    "PS_RESPONSE_DATE" => new DateTime(),
                    "PS_INVOICE_ID" => '',

                );
                $result->setOperationType(ServiceResult::MONEY_COMING);
            } else {
                $message = "Неверная сумма платежа";
                $fields = array(
                    "PS_STATUS" => 'DECLINED',
                    "PS_STATUS_DESCRIPTION" => $message
                );
                $result->addError(new Error($message));
            }
            $result->setPsData($fields);
        } else {
            /*$fields = array(
                "PS_STATUS" => 'DECLINED',
                "PS_STATUS_DESCRIPTION" => $orderInfo->getResponseDescription()
            );*/
            $result->addError(new Error($orderInfo->getResponseDescription()));
        }

    }

    /**
     * @param \Bitrix\Main\Request $request
     * @return mixed
     * @throws \Exception
     */
    public function getPaymentIdFromRequest(\Bitrix\Main\Request $request)
    {
        $response_data = $this->getResponseXmlBody($request);
        $order = new OrderInfo($response_data);
        $paymentId = $this->findPaymentIdByCompassplusOrderId($order->getOrderId());

        return $paymentId;
    }

    /**
     * @param \Bitrix\Sale\Payment $payment
     * @param $refundableSum
     */
    public function refund(\Bitrix\Sale\Payment $payment, $refundableSum)
    {
        // TODO: Implement refund() method.
    }

    /**
     * Создаёт заказ в системе Compassplus
     *
     * Созданный заказ в дальнейшем оплачивается посредством ввода клиентом на платёжной странице Compassplus
     * данных для оплаты
     *
     * @param \Bitrix\Sale\Payment $payment
     * @return Payment
     * @throws \Exception
     */
    private function initCompassplusPaymentOrder(\Bitrix\Sale\Payment $payment)
    {
        $settings = parent::getParamsBusValue($payment);
        $callbackUrl = "https://" . $_SERVER['HTTP_HOST'] . "/bitrix/modules/sale/install/tools/sale_ps_result.php";
        $merchantId = $settings['SALE_COMPASSPLUS_MERCHANT_ID'];
        $clientCertFileId = $settings['SALE_COMPASSPLUS_CERT'];
        $clientKeyFileId = $settings['SALE_COMPASSPLUS_KEY'];

        $order = new \Compassplus\Sdk\Order();
        $date = new \DateTime();
//        $busValues = $this->getParamsBusValue($payment);
        $order->setCurrency(643); // TODO
        $order->setAmount($payment->getSum());
        $order->setDescription($payment->getOrderId());

        $merchant = new \Compassplus\Sdk\Merchant();
        $merchant->setMerchantId($merchantId);
        $merchant->setLanguage("RU");
        $merchant->setApproveUrl($callbackUrl);
        $merchant->setCancelUrl($callbackUrl);
        $merchant->setDeclineUrl($callbackUrl);


        $customer = new \Compassplus\Sdk\Customer();
        $connector = new \Compassplus\Sdk\Connector();

        $clientCertFilePath = $this->getAdminFilePath($clientCertFileId);
        $clientKeyFilePath = $this->getAdminFilePath($clientKeyFileId);

        try {
            $connector->setCert($clientCertFilePath, '');
        } catch (\Exception $e) {
//            print_r($e); // TODO
        }

        $connector->setKey($clientKeyFilePath);
        $compassplusPayment = new Payment($order, $merchant, $customer, $connector);
        return $compassplusPayment;
    }

    private function getAdminFilePath($fileId)
    {
        $fileRes = \CFile::GetByID($fileId);
        $file = $fileRes->Fetch();
        return Application::getDocumentRoot() . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . $file['SUBDIR'] . DIRECTORY_SEPARATOR . $file['FILE_NAME'];
    }

    /**
     * @param OrderInfo $order
     * @param $params
     * @param Registry $registry
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     */
    private function findPaymentIdByCompassplusOrderId($compassplusOrderId)
    {
        $registryType = Registry::REGISTRY_TYPE_ORDER;
        $registry = Registry::getInstance($registryType);
        $params['filter']['PS_STATUS_MESSAGE'] = $compassplusOrderId;
        /** @var \Bitrix\Sale\Payment $paymentClassName */
        $paymentClassName = $registry->getPaymentClassName();
        $result = $paymentClassName::getList($params);
        $data = $result->fetch() ?: array();
        return $data['ID'];
    }

    /**
     * Полуить xml ответа платежной страницы после оплаты из Compassplus
     * @param \Bitrix\Main\Request $request
     * @return string
     */
    private function getResponseXmlBody(\Bitrix\Main\Request $request)
    {
        $response_data = html_entity_decode($request->getRaw('xmlmsg'), ENT_QUOTES, "utf-8");
        return $response_data;
    }

    private function isCorrectSum($paymentSum, $compassplusSum)
    {
        return $paymentSum == ($compassplusSum / 100);
    }

}