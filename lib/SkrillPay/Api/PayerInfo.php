<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;

/**
 * Class PayerInfo
 *
 * A resource representing a information about Payer.
 *
 * @package SkrillPay\Api
 *
 * @property string pay_to_email
 * @property string recipient_description
 * @property string transaction_id
 * @property string return_url
 * @property string return_url_text
 * @property string return_url_target
 * @property string cancel_url
 * @property string cancel_url_target
 * @property string status_url
 * @property string status_url2
 * @property string language
 * @property string logo_url
 * @property string prepare_only
 * @property string dynamic_descriptor
 * @property string sid
 * @property string rid
 * @property string ext_ref_id
 * @property string merchant_fields
 * @property string Field1
 * @property string Field2
 */
class PayerInfo extends SkrillPayModel
{
    /**
     * Email address of your Skrill merchant account.
     * @return string
     */
    public function getPayToEmail()
    {
        return $this->pay_to_email;
    }

    /**
     *  Email address of your Skrill merchant account.
     * @param string $pay_to_email
     * @return $this
     */
    public function setPayToEmail(string $pay_to_email)
    {
        $this->pay_to_email = $pay_to_email;
        return $this;

    }

    /**
     * A description to be shown on the Skrill payment page in the logo area if there is no logo_url parameter. If no value is submitted and there is no logo, the pay_to_email value is shown as the recipient of the payment. (Max 30 characters)
     * @return string
     */
    public function getRecipientDescription()
    {
        return $this->recipient_description;
    }

    /**
     * A description to be shown on the Skrill payment page in the logo area if there is no logo_url parameter. If no value is submitted and there is no logo, the pay_to_email value is shown as the recipient of the payment. (Max 30 characters)
     * @param string $recipient_description
     * @return $this

     */
    public function setRecipientDescription(string $recipient_description)
    {
        $this->recipient_description = $recipient_description;
        return $this;
    }

    /**
     * Your unique reference or identification number for the transaction. (Must be unique for each payment)
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Your unique reference or identification number for the transaction. (Must be unique for each payment)
     * @param string $transaction_id
     * @return $this
     */
    public function setTransactionId(string $transaction_id)
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * URL to which the customer is returned once the payment is made. If this field is not filled, the Skrill Quick Checkout page closes automatically at the end of the transaction and the customer is returned to the page on your website from where they were redirected to Skrill. A secure return URL option is available. (See Secure return_url parameter on page 5-1.)
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->return_url;
    }

    /**
     * URL to which the customer is returned once the payment is made. If this field is not filled, the Skrill Quick Checkout page closes automatically at the end of the transaction and the customer is returned to the page on your website from where they were redirected to Skrill. A secure return URL option is available. (See Secure return_url parameter on page 5-1.)
     * @param string $return_url
     * @return $this
     */
    public function setReturnUrl(string $return_url)
    {
        $this->return_url = $return_url;
        return $this;
    }

    /**
     * The text on the button when the customer finishes their payment.
     * @return string
     */
    public function getReturnUrlText()
    {
        return $this->return_url_text;
    }

    /**
     * The text on the button when the customer finishes their payment.
     * @param string $return_url_text
     * @return $this
     */
    public function setReturnUrlText(string $return_url_text)
    {
        $this->return_url_text = $return_url_text;
        return $this;
    }

    /**
     * Specifies a target in which the return_url value is displayed upon successful payment from the customer. Default value is 1.
        1 = '_top'
        2 = '_parent' 3 = '_self'
        4= '_blank'
     * @return string
     */
    public function getReturnUrlTarget()
    {
        return $this->return_url_target;
    }

    /**
     * Specifies a target in which the return_url value is displayed upon successful payment from the customer. Default value is 1.
        1 = '_top'
        2 = '_parent' 3 = '_self'
        4= '_blank'
     * @param string $return_url_target
     * @return $this
     */
    public function setReturnUrlTarget(string $return_url_target)
    {
        $this->return_url_target = $return_url_target;
        return $this;
    }

    /**
     * URL to which the customer is returned if the payment is cancelled or fails. If no cancel URL is provided the Cancel button is not displayed.
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * URL to which the customer is returned if the payment is cancelled or fails. If no cancel URL is provided the Cancel button is not displayed.
     * @param string $cancel_url
     * @return $this
     */
    public function setCancelUrl(string $cancel_url)
    {
        $this->cancel_url = $cancel_url;
        return $this;
    }

    /**
     * Specifies a target in which the cancel_url value is displayed upon cancellation of payment by the customer. Default value is 1.
        1 = '_top'
        2 = '_parent' 3 = '_self'
        4= '_blank'
     * @return string
     */
    public function getCancelUrlTarget()
    {
        return $this->cancel_url_target;
    }

    /**
     * Specifies a target in which the cancel_url value is displayed upon cancellation of payment by the customer. Default value is 1.
        1 = '_top'
        2 = '_parent' 3 = '_self'
        4= '_blank'
     * @param string $cancel_url_target
     * @return $this
     */
    public function setCancelUrlTarget(string $cancel_url_target)
    {
        $this->cancel_url_target = $cancel_url_target;
        return $this;
    }

    /**
     * URL to which the transaction details are posted after the payment process is complete. Alternatively, you may specify an email address where the results are sent.
        If the status_url is omitted, no transaction details are sent.
        Only the following ports are supported:
        80, 81, 82, 83, 88, 90, 178, 419, 433, 443, 444, 448, 451, 666, 800, 888, 1025, 1430, 1680, 1888, 1916, 1985, 2006, 2221, 3000, 4111, 4121, 4423, 4440, 4441, 4442, 4443, 4450, 4451, 4455, 4567, 5443, 5507, 5653, 5654, 5656, 5678, 6500, 7000, 7001, 7022, 7102, 7777, 7878, 8000, 8001, 8002, 8011, 8014, 8015, 8016, 8027, 8070, 8080, 8081, 8082, 8085, 8086, 8088, 8090, 8097, 8180, 8181, 8443, 8449, 8680, 8843, 8888, 8989, 9006, 9088, 9443, 9797, 10088, 10443, 12312, 18049, 18079, 18080, 18090, 18443, 20202, 20600, 20601, 20603, 20607, 20611, 21301, 22240, 26004, 27040, 28080, 30080, 37208, 37906, 40002, 40005, 40080, 50001, 60080, 60443 These port restrictions apply to all Skrill status urls
     * @return string
     */
    public function getStatusUrl()
    {
        return $this->status_url;
    }

    /**
     * URL to which the transaction details are posted after the payment process is complete. Alternatively, you may specify an email address where the results are sent.
        If the status_url is omitted, no transaction details are sent.
        Only the following ports are supported:
        80, 81, 82, 83, 88, 90, 178, 419, 433, 443, 444, 448, 451, 666, 800, 888, 1025, 1430, 1680, 1888, 1916, 1985, 2006, 2221, 3000, 4111, 4121, 4423, 4440, 4441, 4442, 4443, 4450, 4451, 4455, 4567, 5443, 5507, 5653, 5654, 5656, 5678, 6500, 7000, 7001, 7022, 7102, 7777, 7878, 8000, 8001, 8002, 8011, 8014, 8015, 8016, 8027, 8070, 8080, 8081, 8082, 8085, 8086, 8088, 8090, 8097, 8180, 8181, 8443, 8449, 8680, 8843, 8888, 8989, 9006, 9088, 9443, 9797, 10088, 10443, 12312, 18049, 18079, 18080, 18090, 18443, 20202, 20600, 20601, 20603, 20607, 20611, 21301, 22240, 26004, 27040, 28080, 30080, 37208, 37906, 40002, 40005, 40080, 50001, 60080, 60443 These port restrictions apply to all Skrill status urls
     * @param string $status_url
     * @return $this
     */
    public function setStatusUrl(string $status_url)
    {
        $this->status_url = $status_url;
        return $this;
    }

    /**
     * Second URL to which the transaction details are posted after the payment process is complete. Alternatively, you may specify an email address where the results are sent. The same port restrictions apply as for the status_url parameter above.
     * @return string
     */
    public function getStatusUrl2()
    {
        return $this->status_url2;
    }

    /**
     * Second URL to which the transaction details are posted after the payment process is complete. Alternatively, you may specify an email address where the results are sent. The same port restrictions apply as for the status_url parameter above.
     * @param string $status_url2
     * @return $this
     */
    public function setStatusUrl2(string $status_url2)
    {
        $this->status_url2 = $status_url2;
        return $this;
    }

    /**
     * 2-letter code of the language used for Skrill’s pages. Can be any of the codes in Language support on page 10-2.
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * 2-letter code of the language used for Skrill’s pages. Can be any of the codes in Language support on page 10-2.
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * The URL of the logo which you would like to appear in the top right of the Skrill page. The logo must be accessible via HTTPS or it will not be shown.
        The logo will be resized to fit. To avoid scaling distortion, the minimum size should be as follows:
        • If the logo width > height - at least 107px width.
        • If logo width > height - at least 65px height
        Avoid large images (much greater than 256 by 256px) to minimise the page loading time.
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

    /**
     * The URL of the logo which you would like to appear in the top right of the Skrill page. The logo must be accessible via HTTPS or it will not be shown.
        The logo will be resized to fit. To avoid scaling distortion, the minimum size should be as follows:
        • If the logo width > height - at least 107px width.
        • If logo width > height - at least 65px height
        Avoid large images (much greater than 256 by 256px) to minimise the page loading time.
     * @param string $logo_url
     * @return $this
     */
    public function setLogoUrl(string $logo_url)
    {
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * Forces only the SID to be returned without the actual page. Useful when using the secure method to redirect the customer to Quick Checkout. For details, see Secure redirection method on page 2-4. Accepted values are 0 (default) and 1 (prepare only).
     * @return string
     */
    public function getPrepareOnly()
    {
        return $this->prepare_only;
    }

    /**
     * Forces only the SID to be returned without the actual page. Useful when using the secure method to redirect the customer to Quick Checkout. For details, see Secure redirection method on page 2-4. Accepted values are 0 (default) and 1 (prepare only).
     * @param string $prepare_only
     * @return $this
     */
    public function setPrepareOnly(string $prepare_only)
    {
        $this->prepare_only = $prepare_only;
        return $this;
    }

    /**
     * When a customer pays through Skrill, Skrill submits a preconfigured descriptor with the transaction, containing your business trading name/ brand name. The descriptor is typically displayed on the bank or credit card statement of the customer. For Klarna and Direct Debit payment methods, you can submit a dynamic_descriptor, which will override the default value stored by Skrill. See Adding a descriptor on page 5-2 for more details.
     * @return string
     */
    public function getDynamicDescriptor()
    {
        return $this->dynamic_descriptor;
    }

    /**
     * When a customer pays through Skrill, Skrill submits a preconfigured descriptor with the transaction, containing your business trading name/ brand name. The descriptor is typically displayed on the bank or credit card statement of the customer. For Klarna and Direct Debit payment methods, you can submit a dynamic_descriptor, which will override the default value stored by Skrill. See Adding a descriptor on page 5-2 for more details.
     * @param string $dynamic_descriptor
     * @return $this
     */
    public function setDynamicDescriptor(string $dynamic_descriptor)
    {
        $this->dynamic_descriptor = $dynamic_descriptor;
        return $this;
    }

    /**
     * This is an optional parameter containing the Session ID returned by the prepare_only call. If you use this parameter you should not supply any other parameters.
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * This is an optional parameter containing the Session ID returned by the prepare_only call. If you use this parameter you should not supply any other parameters.
     * @param string $sid
     * @return $this
     */
    public function setSid(string $sid)
    {
        $this->sid = $sid;
        return $this;
    }

    /**
     * You can pass a unique referral ID or email of an affiliate from which the customer is referred. The rid value must be included within the actual payment request.
     * @return string
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * You can pass a unique referral ID or email of an affiliate from which the customer is referred. The rid value must be included within the actual payment request.
     * @param string $rid
     * @return $this
     */
    public function setRid(string $rid)
    {
        $this->rid = $rid;
        return $this;
    }

    /**
     * You can pass additional identifier in this field in order to track your affiliates. You must inform your account manager about the exact value that will be submitted so that affiliates can be tracked.
     * @return string
     */
    public function getExtRefId()
    {
        return $this->ext_ref_id;
    }

    /**
     * You can pass additional identifier in this field in order to track your affiliates. You must inform your account manager about the exact value that will be submitted so that affiliates can be tracked.
     * @param string $ext_ref_id
     * @return $this
     */
    public function setExtRefId(string $ext_ref_id)
    {
        $this->ext_ref_id = $ext_ref_id;
        return $this;
    }

    /**
     * A comma-separated list of field names that are passed back to your web server when the payment is confirmed (maximum 5 fields).
     * @return string
     */
    public function getMerchantFields()
    {
        return $this->merchant_fields;
    }

    /**
     * A comma-separated list of field names that are passed back to your web server when the payment is confirmed (maximum 5 fields).
     * @param string $merchant_fields
     * @return $this
     */
    public function setMerchantFields(string $merchant_fields)
    {
        $this->merchant_fields = $merchant_fields;
        return $this;
    }

    /**
     * An example merchant field
     * @return string
     */
    public function getField1()
    {
        return $this->Field1;
    }

    /**
     * An example merchant field
     * @param string $Field1
     * @return $this
     */
    public function setField1(string $Field1)
    {
        $this->Field1 = $Field1;
        return $this;
    }

    /**
     * An example merchant field
     * @return string
     */
    public function getField2()
    {
        return $this->Field2;
    }

    /**
     * An example merchant field
     * @param string $Field2
     * @return $this
     */
    public function setField2(string $Field2)
    {
        $this->Field2 = $Field2;
        return $this;
    }


}
