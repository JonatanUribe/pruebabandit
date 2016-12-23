<?php 
namespace JonatanUribe\pruebabandit;

class TransactionInformation
{
    public $transactionID;
    public $sessionID;
    public $reference;
    public $requestDate;
    public $bankProcessDate;
    public $onTest;
    public $returnCode;
    public $trazabilityCode;
    public $transactionCycle;
    public $transactionState;
    public $responseCode;
    public $responseReasonCode;
    public $responseReasonText;
    
    public function __construct($transactionID, $sessionID, $reference, $requestDate, $bankProcessDate, $onTest, $returnCode, $trazabilityCode, $transactionCycle, $transactionState, $responseCode, $responseReasonCode, $responseReasonText)
    {
        $this->transactionID = $transactionID;
        $this->sessionID = $sessionID;
        $this->reference = $reference;
        $this->requestDate = $requestDate;
        $this->bankProcessDate = $bankProcessDate;
        $this->onTest = $onTest;
        $this->returnCode = $returnCode;
        $this->trazabilityCode = $trazabilityCode;
        $this->transactionCycle = $transactionCycle;
        $this->transactionState = $transactionState;
        $this->responseCode = $responseCode;
        $this->responseReasonCode = $responseReasonCode;
        $this->responseReasonText = $responseReasonText;
    }
    
    public function getTransactionID()
    {
        return $this->transactionID;
    }
    
    public function getSessionID()
    {
        return $this->sessionID;
    }
    
    public function getReference()
    {
        return $this->reference;
    }
    
    public function getRequestDate()
    {
        return $this->requestDate;
    }
    
    public function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }
    
    public function getOnTest()
    {
        return $this->onTest;
    }
    
    public function getReturnCode()
    {
        return $this->returnCode;
    }
    
    public function getTrazabilityCode()
    {
        return $this->trazabilityCode;
    }
    
    public function getTransactionCycle()
    {
        return $this->transactionCycle;
    }
    
    public function getTransactionState()
    {
        return $this->transactionState;
    }
    
    public function getResponseCode()
    {
        return $this->responseCode;
    }
    
    public function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }
    
    public function getResponseReasonText()
    {
        return $this->responseReasonText;
    }
}
