<?php

class Cooker 
{

    private $cookerId;    
    private $name;
    private $email;    
    private $password;    
    private $picture;    
    
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }       
    
    function getCookerId() {
        return $this->cookerId;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }
    
    function getPicture() {
        return $this->picture;
    }

    function setCookerId($cookerId) {
        $this->cookerId = $cookerId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }   

    function setPicture($picture) {
        $this->picture = $picture;
    }

        
    public function hydrate(array $data) 
    {
        if (isset($data['cookerId'])) 
        {
            $this->setCookerId($data['cookerId']);
        }   
        
        if (isset($data['name'])) 
        {
            $this->setName($data['name']);
        }

        if (isset($data['email'])) 
        {
            $this->setEmail($data['email']);
        }                                  
        
        if (isset($data['password'])) 
        {
            $this->setPassword($data['password']);
        }                
        
        if (isset($data['picture'])) 
        {
            $this->setPicture($data['picture']);
        }                
                
    }

}
