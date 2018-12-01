<?php
class RECEIPT
{
    
    public $bdd;


    function __construct()
    {
        try
        {                     
//            $this->bdd = new PDO('mysql:host=mysql.hit.ng;dbname=vadramson;charset=utf8', 'receiptapp', 'Vreceiptapp#@1DB');                                             
            $this->bdd = new PDO('mysql:host=localhost;dbname=receipt;charset=utf8', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch (Exception $e)
        {
            die('Error : ' . $e->getMessage()); 
        }
    }    
}

function clean($input)
    {
        return addslashes(trim($input));
    }
    
?>