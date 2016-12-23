<?php 
namespace JonatanUribe\pruebabandit;

class Session
{
    public $session = "";
    
    public function __construct($key = '', $value = '')
    {
        if ($key != '' && $value != '') {
            $this->setSession($key, $value);
        }
    }
    
    public function setSession($key, $value)
    {
        if (!isset($this->session[$key])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION[$key] = $value;
            $this->session = $_SESSION;
        }
    }
    
    public function getSession($key)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION[$key])) {
            $this->session[$key] = $_SESSION[$key];
        } else {
            $this->session[$key] = '';
        }
        if (isset($this->session[$key])) {
            return $this->session[$key];
        } else {
            return '';
        }
    }
}
