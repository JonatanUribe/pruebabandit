<?php 
namespace JonatanUribe\pruebabandit;

class Authentication
{
    private $login;
    private $tranKey;
    private $seed;
    private $additional;
    public function __construct($login, $tranKey, $additional = '')
    {
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = $this->generateHashKey($tranKey);
        if ($additional) {
            $this->additional = $additional;
		}
    }
    
    public function getLogin()
    {
        return $this->login;
    }
    
    public function setLogin($login)
    {
        $this->login = $login;
    }
    
    public function getTranKey()
    {
        return $this->tranKey;
    }
    
    public function setTranKey($tranKey)
    {
        $this->tranKey = $tranKey;
    }
    
    public function getAdditional()
    {
        return $this->additional;
    }
    
    public function setAdditional($additional)
    {
        $this->additional = $additional;
    }
    
    private function generateHashKey($tranKey)
    {
        return sha1($this->seed . $tranKey, false);
    }
}

?>
