<?php


namespace FuriosoJack\PayUPaymentLaravel\Traits;
use FuriosoJack\PayUPaymentLaravel\Facades\LaravelPayU;
use FurosoJack\PayUPaymentSDK\PayU\exceptions\PayUException;
use FurosoJack\PayUPaymentSDK\PayU\PayUReports;
use FurosoJack\PayUPaymentSDK\PayU\util\InvalidParameterException;
use FurosoJack\PayUPaymentSDK\PayU\util\PayUParameters;
use InvalidArgumentException;

/**
 * Class Searchable
 * @package FuriosoJack\PayUPaymentLaravel\Traits
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Searchable
{
    /**
     * Search an order using the id asigned by PayU.
     *
     * @param  callback  $onSuccess
     * @param  callback  $onError
     * @return mixed
     *
     */
    public function searchById($onSuccess, $onError)
    {
        LaravelPayU::setPayUEnvironment();
        try {
            $params[PayUParameters::ORDER_ID] = $this->payu_order_id;
            $response = PayUReports::getOrderDetail($params);
            if ($response) {
                $onSuccess($response, $this);
            }
        } catch (PayUException $exc) {
            $onError($exc);
        } catch (InvalidArgumentException $exc) {
            $onError($exc);
        }
    }
    /**
     * Search an order using the reference created before attempt the processing.
     *
     * @param  callback  $onSuccess
     * @param  callback  $onError
     * @return mixed
     *
     */
    public function searchByReference($onSuccess, $onError)
    {
        LaravelPayU::setPayUEnvironment();
        try {
            $params[PayUParameters::REFERENCE_CODE] = $this->reference;
            $response = PayUReports::getOrderDetailByReferenceCode($params);
            if ($response) {
                $onSuccess($response, $this);
            }
        } catch (PayUException $exc) {
            $onError($exc);
        } catch (InvalidArgumentException $exc) {
            $onError($exc);
        } catch (\FurosoJack\PayUPaymentSDK\PayU\InvalidArgumentException $e) {
        } catch (InvalidParameterException $e) {
        }
    }
    /**
     * Search an order using the transactionId asigned by PayU.
     *
     * @param  callback  $onSuccess
     * @param  callback  $onError
     * @return mixed
     *
     */
    public function searchByTransaction($onSuccess, $onError)
    {
        LaravelPayU::setPayUEnvironment();
        try {
            $params[PayUParameters::TRANSACTION_ID] = $this->transaction_id;
            $response = PayUReports::getTransactionResponse($params);
            if ($response) {
                $onSuccess($response, $this);
            }
        } catch (PayUException $exc) {
            $onError($exc);
        } catch (InvalidArgumentException $exc) {
            $onError($exc);
        }
    }

}