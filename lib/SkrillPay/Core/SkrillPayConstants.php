<?php

namespace SkrillPay\Core;

/**
 * Class SkrillPayConstants
 * Placeholder for SkrillPay Constants
 *
 * @package SkrillPay\Core
 */
class SkrillPayConstants
{

    const SDK_NAME = 'SkrillPay';
    const SDK_VERSION = '1.1.0';

    /**
     * Approval URL for Payment
     */
    const APPROVAL_URL = 'approval_url';

    const REST_SANDBOX_ENDPOINT = "https://pay.skrill.com";
    const OPENID_REDIRECT_SANDBOX_URL = "https://pay.skrill.com";

    const REST_LIVE_ENDPOINT = "https://pay.skrill.com";
    const OPENID_REDIRECT_LIVE_URL = "https://pay.skrill.com";



    /**
     * Processed
     * Sent when the transaction is processed and the funds have been received in your Skrill account.
     */
    const STATUS_PROCESSED = 2;

    /**
     * Pending
     * Sent when the customers pays via an offline bank transfer option. Such transactions will auto-process if the bank transfer is received by Skrill.
    Note: We strongly recommend that you do not process the order or transaction in your system upon receipt of this status from Skrill.
     */
    const STATUS_PENDING = 0;

    /**
     * Cancelled
     * Pending transactions can either be cancelled manually by the sender in their online Skrill Digital Wallet account history or they will auto-cancel after 14 days if still pending.
     */
    const STATUS_CANCELED = -1;


    /**
     * Failed
     * This status is typically sent when the customer tries to pay via Credit Card or Direct Debit but our provider declines the transaction. It can also be sent if the transaction is declined by Skrill’s internal fraud engine for example: failed_reason_code 54 - Failed due to internal security restrictions. For a description of all failed reason codes, see Failed reason codes on page 10-17.
     */
    const STATUS_FAILED = -2;

    /**
     * Chargeback
     * Whenever a chargeback is received by Skrill, a ‘-3’ status is posted in the status_url and an email is sent to the primary email address linked to the Merchant’s account. Skrill also creates a new debit transaction to debit the funds from your merchant account.
     */
    const STATUS_CHARGEBACK = -3;

}
