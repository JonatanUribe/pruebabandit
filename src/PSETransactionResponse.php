<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Session;

class PSETransactionResponse
{
    public $transactionID;
    public $sessionID;
    public $returnCode;
    public $trazabilityCode;
    public $transactionCycle;
    public $bankCurrency;
    public $bankFactor;
    public $bankURL;
    public $responseCode;
    public $responseReasonCode;
    public $responseReasonText;
    
    public function __construct($transactionID, $sessionID, $returnCode, $trazabilityCode, $transactionCycle, $bankCurrency, $bankFactor, $bankURL, $responseCode, $responseReasonCode, $responseReasonText)
    {
        $this->transactionID = $transactionID;
        $this->sessionID = $sessionID;
        $this->returnCode = $returnCode;
        $this->trazabilityCode = $trazabilityCode;
        $this->transactionCycle = $transactionCycle;
        $this->bankCurrency = $bankCurrency;
        $this->bankFactor = $bankFactor;
        $this->bankURL = $bankURL;
        $this->responseCode = $responseCode;
        $this->responseReasonCode = $responseReasonCode;
        $this->responseReasonText = $responseReasonText;
    }
    
    public function getPSETransactionResponse()
    {
        return $this;
    }
}

?>

