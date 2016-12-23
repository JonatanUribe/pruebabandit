<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Session;

class PSETransactionResponse
{
	var $transactionID;
    var $sessionID;
    var $returnCode;
    var $trazabilityCode;
    var $transactionCycle;
    var $bankCurrency;
    var $bankFactor;
    var $bankURL;
    var $responseCode;
    var $responseReasonCode;
    var $responseReasonText;
	
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

