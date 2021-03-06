<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 6-7-16
 * Time: 16:39
 */

namespace Paynl;


use Paynl\Api\DirectDebit as Api;
use Paynl\Error\Required;
use Paynl\Result\DirectDebit as Result;

class DirectDebit
{
    /**
     * Add a Single DirectDebit Transaction (non recurring)
     *
     * @param array $options
     * @throws Required When a required field is not set
     */
    public static function add($options = array())
    {
        $api = new Api\DebitAdd();

        if (empty($options['amount'])) {
            throw new Required('amount');
        } else {
            $api->setAmount(round($options['amount'] * 100));
        }
        if (empty($options['bankaccountHolder'])) {
            throw new Required('bankaccountHolder');
        } else {
            $api->setBankaccountHolder($options['bankaccountHolder']);
        }
        if (empty($options['bankaccountNumber'])) {
            throw new Required('bankaccountNumber');
        } else {
            $api->setBankaccountNumber($options['bankaccountNumber']);
        }
        if (!empty($options['bankaccountBic'])) {
            $api->setBankaccountBic($options['bankaccountBic']);
        }
        if (!empty($options['processDate'])) {
            if (is_string($options['processDate'])) {
                $options['processDate'] = new \DateTime($options['processDate']);
            }
            $api->setProcessDate($options['processDate']);
        }
        if (!empty($options['description'])) {
            $api->setDescription($options['description']);
        }
        if (!empty($options['ipAddress'])) {
            $api->setIpAddress($options['ipAddress']);
        }
        if (!empty($options['email'])) {
            $api->setEmail($options['email']);
        }
        if (!empty($options['promotorId'])) {
            $api->setPromotorId($options['promotorId']);
        }
        if (!empty($options['tool'])) {
            $api->setTool($options['tool']);
        }
        if (!empty($options['info'])) {
            $api->setInfo($options['info']);
        }
        if (!empty($options['object'])) {
            $api->setObject($options['object']);
        }
        if (!empty($options['extra1'])) {
            $api->setExtra1($options['extra1']);
        }
        if (!empty($options['extra2'])) {
            $api->setExtra2($options['extra2']);
        }
        if (!empty($options['extra3'])) {
            $api->setExtra3($options['extra3']);
        }
        if (!empty($options['currency'])) {
            $api->setCurrency($options['currency']);
        }
        if (!empty($options['exchangeUrl'])) {
            $api->setExchangeUrl($options['exchangeUrl']);
        }

        $result = $api->doRequest();

        return new Result\Add($result);
    }

    public static function get($mandateId)
    {
        $api = new Api\DebitGet();
        $api->setMandateId($mandateId);

        $result = $api->doRequest();
        return new Result\Get($result);
    }

    public function delete($mandateId)
    {
        $api = new Api\Delete();
        $api->setMandateId($mandateId);

        $result = $api->doRequest();
        return $result;
    }

    public function update($mandateId, $options)
    {
        if (empty($mandateId)) {
            throw new Required('mandateId');
        }
        $api = new Api\Update();
        $api->setMandateId($mandateId);

        if (!empty($options['amount'])) {
            $api->setAmount(round($options['amount'] * 100));
        }
        if (!empty($options['bankaccountHolder'])) {
            $api->setBankaccountHolder($options['bankaccountHolder']);
        }
        if (!empty($options['bankaccountNumber'])) {
            $api->setBankaccountNumber($options['bankaccountNumber']);
        }
        if (!empty($options['bankaccountBic'])) {
            $api->setBankaccountBic($options['bankaccountBic']);
        }
        if (!empty($options['processDate'])) {
            $processDate = $options['processDate'];
            if (!($processDate instanceof \DateTime)) {
                $processDate = new \DateTime($processDate);
            }
            $api->setProcessDate($processDate);
        }
        if (!empty($options['intervalValue'])) {
            $api->setIntervalValue($options['intervalValue']);
        }
        if (!empty($options['intervalPeriod'])) {
            $api->setIntervalPeriod($options['intervalPeriod']);
        }
        if (!empty($options['intervalQuantity'])) {
            $api->setIntervalQuantity($options['intervalQuantity']);
        }
        if (!empty($options['description'])) {
            $api->setDescription($options['description']);
        }
        if (!empty($options['ipAddress'])) {
            $api->setIpAddress($options['ipAddress']);
        }
        if (!empty($options['email'])) {
            $api->setEmail($options['email']);
        }
        if (!empty($options['promotorId'])) {
            $api->setPromotorId($options['promotorId']);
        }
        if (!empty($options['tool'])) {
            $api->setTool($options['tool']);
        }
        if (!empty($options['info'])) {
            $api->setInfo($options['info']);
        }
        if (!empty($options['object'])) {
            $api->setObject($options['object']);
        }
        if (!empty($options['extra1'])) {
            $api->setExtra1($options['extra1']);
        }
        if (!empty($options['extra2'])) {
            $api->setExtra2($options['extra2']);
        }
        if (!empty($options['extra3'])) {
            $api->setExtra3($options['extra3']);
        }
        $result = $api->doRequest();
        return $result;
    }
}
