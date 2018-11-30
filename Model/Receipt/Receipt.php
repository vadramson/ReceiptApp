<?php

class Receipts 
{

    private $receiptsId;    
    private $cookerId;
    private $name;
    private $duration;
    private $description;
    private $guest;
    private $receipt_status;
    private $image;
    
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }       

    function getReceiptsId() {
        return $this->receiptsId;
    }

    function getCookerId() {
        return $this->cookerId;
    }

    function getName() {
        return $this->name;
    }

    function getDuration() {
        return $this->duration;
    }

    function getDescription() {
        return $this->description;
    }

    function getGuest() {
        return $this->guest;
    }

    function getImage() {
        return $this->image;
    }

    function setReceiptsId($receiptsId) {
        $this->receiptsId = $receiptsId;
    }

    function setCookerId($cookerId) {
        $this->cookerId = $cookerId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDuration($duration) {
        $this->duration = $duration;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setGuest($guest) {
        $this->guest = $guest;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function getReceipt_status() {
        return $this->receipt_status;
    }

    function setReceipt_status($receipt_status) {
        $this->receipt_status = $receipt_status;
    }

                        
    public function hydrate(array $data) 
    {
        if (isset($data['receiptsId'])) 
        {
            $this->setReceiptsId($data['receiptsId']);
        }

        if (isset($data['cookerId'])) 
        {
            $this->setCookerId($data['cookerId']);
        }       
        
        if (isset($data['name'])) 
        {
            $this->setName($data['name']);
        }
        
        if (isset($data['duration'])) 
        {
            $this->setDuration($data['duration']);
        }
        
        if (isset($data['description'])) 
        {
            $this->setDescription($data['description']);
        }
        if (isset($data['guest'])) 
        {
            $this->setGuest($data['guest']);
        }
        if (isset($data['image'])) 
        {
            $this->setImage($data['image']);
        }
                
    }

}
