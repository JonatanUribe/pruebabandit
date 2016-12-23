<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Authentication;
use JonatanUribe\pruebabandit\Session;

class Client
{
	public $data = array();
	private $id = '6dd490faf9cb87a9862245da41170ff2';
	private $key = '024h1IlD';
	private $session = '';
	public function __construct() 
	{
		
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function getListBanks()
	{
		$this->session = new Session();
		$listBanks = '';
		if($this->session->getSession('listBanks') == '') 
		{
		    $auth = new Authentication($this->id, $this->key);
		    $params = ["auth" => $auth];
		    $client = new \SoapClient("https://test.placetopay.com/soap/pse/?wsdl");
		    $listBanks = $client->__soapCall('getBankList', array($params));
		    $this->session->setSession('listBanks', $listBanks);
		} else {
			$listBanks = $this->session->getSession('listBanks');
		}
		return $listBanks;
	}
	
	public function makeTransaction($transactionRequest) 
	{
		try {
			$this->session = new Session();
			$auth = new Authentication($this->id, $this->key);
			$params = ["auth" => $auth, "transaction" => $transactionRequest];
			$client = new \SoapClient("https://test.placetopay.com/soap/pse/?wsdl");
			$response = $client->createTransaction($params);
			$this->session->setSession('transaction', $response->createTransactionResult);
			$transactionInfo = $this->setTransactionInfo($response->createTransactionResult->transactionID);
			return $transactionInfo;
		} catch(Exception $e) 
		{
			print_r($e);
		}
	}
	
	public function setTransactionInfo($transactionId)
	{
		try {
			$this->session = new Session();
			$auth = new Authentication($this->id, $this->key);
			$params = ["auth" => $auth, "transactionID" => $transactionId];
			$client = new \SoapClient("https://test.placetopay.com/soap/pse/?wsdl");
			$response = $client->__soapCall('getTransactionInformation', array($params));
			$transactionID = $response->getTransactionInformationResult->transactionID;
			$sessionID = $response->getTransactionInformationResult->sessionID;
			$reference = $response->getTransactionInformationResult->reference;
			$requestDate = $response->getTransactionInformationResult->requestDate;
			$bankProcessDate = $response->getTransactionInformationResult->bankProcessDate;
			$onTest = $response->getTransactionInformationResult->onTest;
			$returnCode = $response->getTransactionInformationResult->returnCode;
			$trazabilityCode = $response->getTransactionInformationResult->trazabilityCode;
			$transactionCycle = $response->getTransactionInformationResult->transactionCycle;
			$transactionState = $response->getTransactionInformationResult->transactionState;
			$responseCode = $response->getTransactionInformationResult->responseCode;
			$responseReasonCode = $response->getTransactionInformationResult->responseReasonCode;
			$responseReasonText = $response->getTransactionInformationResult->responseReasonText;
			$transactionInformation = new TransactionInformation($transactionID, $sessionID, $reference, $requestDate, $bankProcessDate, $onTest, $returnCode, $trazabilityCode, $transactionCycle, $transactionState, $responseCode, $responseReasonCode, $responseReasonText);
			$this->session->setSession('transactionInformation', $transactionInformation);
			return $transactionInformation;
		} catch(Exception $e) 
		{
			print_r($e);
		}
	}
	
}

?>
