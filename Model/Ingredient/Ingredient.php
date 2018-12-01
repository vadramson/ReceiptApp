<?php

class Ingredient 
{

    private $ingredientId;    
    private $receiptsId;
    private $cookerId;
    private $name;
    private $quantity;
    private $unit;
    
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }       

    function getIngredientId() {
        return $this->ingredientId;
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

    function getQuantity() {
        return $this->quantity;
    }

    function setIngredientId($ingredientId) {
        $this->ingredientId = $ingredientId;
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

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function getUnit() {
        return $this->unit;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    
                    
    public function hydrate(array $data) 
    {
        if (isset($data['ingredientId'])) 
        {
            $this->setIngredientId($data['ingredientId']);
        }

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
        
        if (isset($data['quantity'])) 
        {
            $this->setQuantity($data['quantity']);
        }
        
        if (isset($data['unit'])) 
        {
            $this->setUnit($data['unit']);
        }
                
                
    }

}
