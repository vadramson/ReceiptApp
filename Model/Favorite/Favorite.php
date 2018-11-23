<?php

class Favorite 
{

    private $favoritesId;    
    private $cookerId;
    private $receiptsId;    
    private $createdAt;    
    
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }       
    
    function getFavoritesId() {
        return $this->favoritesId;
    }

    function getCookerId() {
        return $this->cookerId;
    }

    function getReceiptsId() {
        return $this->receiptsId;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function setFavoritesId($favoritesId) {
        $this->favoritesId = $favoritesId;
    }

    function setCookerId($cookerId) {
        $this->cookerId = $cookerId;
    }

    function setReceiptsId($receiptsId) {
        $this->receiptsId = $receiptsId;
    }

    function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
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
        
        if (isset($data['createdAt'])) 
        {
            $this->setCreatedAt($data['createdAt']);
        }                
                
    }

}
