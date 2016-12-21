<?php 
namespace JonatanUribe\pruebabandit;

class Session
{
	public $session = "";
	
	public function __construct() 
	{
		
	}
	
	public function setSession($key, $value)
	{
		if(!isset($this->session[$key])) 
		{
		    $this->session[$key] = $value;
		}
	}
	
	public function getSession()
	{
		return $this->session;
	}
}

?>
