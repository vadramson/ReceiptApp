<?php

class CookerManager 
{

    private $_db; // DB Instance 

    public function __construct($db) 
    {
        $this->setDb($db);
    }

    public function setDb($db) 
    {
        $this->_db = $db;
    }

    // Method new user Signup 
    
    function sign_up($receiptAppData) 
    {
        $resul = $this->_db->query(" SELECT * FROM cookers WHERE email = '" . $receiptAppData->getEmail(). "' OR password = '" . $receiptAppData->getPassword(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) 
        {
        
            $q = $this->_db->prepare("INSERT INTO cookers SET name = :name, email = :email, password = :password, picture = :picture ") or die(mysql_error());

            $q->bindValue(':name', $receiptAppData->getName());
            $q->bindValue(':email', $receiptAppData->getEmail());                   
            $q->bindValue(':password', $receiptAppData->getPassword());                   
            $q->bindValue(':picture', $receiptAppData->getPicture());                   
            $q->execute();     

            echo"<script language='javascript'>alert(' Signup Successful! \n You can now login into your account')</script>";       
        }
        else
        {
            echo"<script language='javascript'>alert(' Email or Password Exists Already! \n Try ausing a different one ')</script>";       
        }
    }
        
    // Method new user login 
    public function login($receiptAppData) 
    {
            $q = $this->_db->query(" SELECT * FROM cookers WHERE (email ='" . $receiptAppData->getEmail() . "' && password ='" . $receiptAppData->getPassword() . "') && status = 'Active'  ") or die(mysql_error());        
            $reqt = $q->fetch();
             if ($reqt == NULL) 
             {
                echo"<script language='javascript'>alert(' Wrong Username or password!')</script>";
             }
             else
             {
                 // Create user session and Redirect user to homepage
             }
     
    }
    
  

}
