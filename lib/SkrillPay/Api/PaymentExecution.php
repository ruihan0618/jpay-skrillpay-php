<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;

/**
 * Class PaymentExecution
 *
 * Let's you execute a SkrillPay Account based Payment resource with the payer_id obtained from web approval url.
 *
 * @package SkrillPay\Api
 *
 * @property string payer_id
 * @property \SkrillPay\Api\Transaction[] transactions
 */
class PaymentExecution extends SkrillPayModel
{
    /**
     * The ID of the Payer, passed in the `return_url` by SkrillPay.
     *
     * @param string $payer_id
     * 
     * @return $this
     */
    public function setPayerId($payer_id)
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * The ID of the Payer, passed in the `return_url` by SkrillPay.
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Carrier account id for a carrier billing payment. For a carrier billing payment, payer_id is not applicable.
     * @deprecated Not publicly available
     * @param string $carrier_account_id
     * 
     * @return $this
     */
    public function setCarrierAccountId($carrier_account_id)
    {
        $this->carrier_account_id = $carrier_account_id;
        return $this;
    }

    /**
     * Carrier account id for a carrier billing payment. For a carrier billing payment, payer_id is not applicable.
     * @deprecated Not publicly available
     * @return string
     */
    public function getCarrierAccountId()
    {
        return $this->carrier_account_id;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @param \SkrillPay\Api\Transaction[] $transactions
     * 
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @return \SkrillPay\Api\Transaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Append Transactions to the list.
     *
     * @param \SkrillPay\Api\Transaction $transaction
     * @return $this
     */
    public function addTransaction($transaction)
    {
        if (!$this->getTransactions()) {
            return $this->setTransactions(array($transaction));
        } else {
            return $this->setTransactions(
                array_merge($this->getTransactions(), array($transaction))
            );
        }
    }

    /**
     * Remove Transactions from the list.
     *
     * @param \SkrillPay\Api\Transaction $transaction
     * @return $this
     */
    public function removeTransaction($transaction)
    {
        return $this->setTransactions(
            array_diff($this->getTransactions(), array($transaction))
        );
    }

}
