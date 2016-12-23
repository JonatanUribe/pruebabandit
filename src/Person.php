<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Session;

class Person
{
    public $document = '';
    public $documentType = '';
    public $firstName = '';
    public $lastName = '';
    public $company = '';
    public $emailAddress = '';
    public $city = '';
    public $province = '';
    public $country = '';
    public $phone = '';
    public $mobile = '';
    
    public function __construct($document, $documentType, $firstName, $lastName, $company, $emailAddress, $city, $province, $country = 'CO', $phone, $mobile)
    {
        $this->document = $document;
        $this->documentType = $documentType;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
        $this->emailAddress = $emailAddress;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->phone = $phone;
        $this->mobile = $mobile;
    }
    
    public function getDocument()
    {
        return $this->document;
    }
    
    public function getDocumentType()
    {
        return $this->documentType;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getCompany()
    {
        return $this->company;
    }
    
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function getProvince()
    {
        return $this->province;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
    
    public function getCountry()
    {
        return $this->country;
    }
    
    public function getMobile()
    {
        return $this->mobile;
    }
}

?>

