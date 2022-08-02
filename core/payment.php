<?php

class Payment
{
    private $zarinpalMerchantID = zarinpalMerchantID;//Required
    private $zarinpalCallbackURL = callbackURL;//Required

    function __construct()
    {
        require('public/nusoap/nusoap.php');
    }

    function zarinpalRequest($Amount, $Description, $Email, $Mobile)
    {
        $client = new nusoap_client(zarinpalWebAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $params = array(
            'MerchantID' => $this->zarinpalMerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $this->zarinpalCallbackURL);
        $result = $client->call('PaymentRequest', $params);

        $Status = $result['Status'];
        $Authority = '';
        if ($result['Status'] != 100) {
            $Error = $this->zarinpalErrors[$Status];
        }
        if ($result['Status'] == 100) {
            $Authority = $result['Authority'];
            return array($result['Status'], $result['RefID']);
        }
        return array('Status' => $Status,'Authority' => $Authority);
    }

    function zarinpalVerify($Amount, $Authority)
    {
        $client = new nusoap_client(zarinpalWebAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentVerification', array(
            'MerchantID' => $this->zarinpalMerchantID,
            'Amount' => $Amount,
            'Authority' => $Authority
        ));
        $Status = $result['Status'];
        $Error = '';
        $RefID = '';
        if ($result['Status'] != 100) {
            $ErrorArray=unserialize(zarinpalErrors);
            $Error=$ErrorArray[$Status];
        }
        if ($result['Status'] == 100) {
            $RefID = $result['RefID'];
            return array($result['Status'], $result['RefID']);
        }
        return array('Status' => $Status, 'Error' => $Error, 'RefID' => $RefID);
    }
}
