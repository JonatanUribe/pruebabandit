<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Session;
use JonatanUribe\pruebabandit\Person;

class PSETransactionRequest
{
    public $bankCode;
    public $bankInterface;
    public $returnURL;
    public $reference;
    public $description;
    public $language;
    public $currency;
    public $totalAmount = 0;
    public $taxAmount = 0;
    public $devolutionBase = 0;
    public $tipAmount = 0;
    public $payer;
    public $buyer;
    public $shipping;
    public $ipAddress;
    public $userAgent;
    public $additionalData;
    
    public function __construct($bankCode, $bankInterface, $returnURL, $reference, $description, $language, $currency, $totalAmount, $taxAmount, $devolutionBase, $tipAmount, $payer, $buyer, $shipping, $ipAddress, $additionalData)
    {
        $this->bankCode = $bankCode;
        $this->bankInterface = $bankInterface;
        $this->returnURL = $returnURL;
        $this->reference = $reference;
        $this->description = $description;
        $this->language = $language;
        $this->currency = $currency;
        $this->totalAmount = $totalAmount;
        $this->taxAmount = $taxAmount;
        $this->devolutionBase = $devolutionBase;
        $this->tipAmount = $tipAmount;
        $this->payer = $payer;
        $this->buyer = $buyer;
        $this->shipping = $shipping;
        $this->additionalData = $additionalData;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
    }
    
    public function getBankCode()
    {
        return $this->bankCode;
    }
    
    public function getBankInterface()
    {
        return $this->bankInterface;
    }
    
    public function getReturnURL()
    {
        return $this->returnURL;
    }
    
    public function getReference()
    {
        return $this->reference;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getLanguage()
    {
        return $this->language;
    }
    
    public function getCurrency()
    {
        return $this->currency;
    }
    
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }
    
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }
    
    public function getDevolutionBase()
    {
        return $this->devolutionBase;
    }
    
    public function getTipAmount()
    {
        return $this->tipAmount;
    }
    
    public function getPayer()
    {
        return $this->payer;
    }
    
    public function getBuyer()
    {
        return $this->buyer;
    }
    
    public function getShipping()
    {
        return $this->shipping;
    }
    
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
    
    public function getUserAgent()
    {
        return $this->userAgent;
    }
    
    public function getAdditionalData()
    {
        return $this->additionalData;
    }
    
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }
    
    public function setBankInterface($bankInterface)
    {
        $this->bankInterface = $bankInterface;
    }
    
    public function setReturnURL($returnURL)
    {
        $this->returnURL = $returnURL;
    }
    
    public function setReference($reference)
    {
        $this->reference = $reference;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function setLanguage($language)
    {
        $this->language = $language;
    }
    
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }
    
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }
    
    public function setDevolutionBase($devolutionBase)
    {
        $this->devolutionBase = $devolutionBase;
    }
    
    public function setTipAmount($tipAmount)
    {
        $this->tipAmount = $tipAmount;
    }
    
    public function setPayer($payer)
    {
        $this->payer = $payer;
    }
    
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }
    
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }
    
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }
    
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }
    
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }
}

?>

