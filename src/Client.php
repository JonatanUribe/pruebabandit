<?php 
namespace JonatanUribe\pruebabandit;

class Client
{
	public $data = array();
	
	public function __construct() 
	{
		
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function getListBanks()
	{
		$client = new SoapClient("https://test.placetopay.com/soap/pse/?wsdl");
		return $client->getBankList();
	}
}

?>
