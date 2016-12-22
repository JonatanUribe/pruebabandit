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
}

?>
