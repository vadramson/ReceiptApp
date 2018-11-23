<?php

class IngredientManager 
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

    // Method to add new Ingredients
    
    function add_ingredient($receiptAppData) 
    {
        $q = $this->_db->prepare("INSERT INTO ingredient SET receiptsId = :receiptsId, cookerId = :cookerId, name = :name, quantity = :quantity") or die(mysql_error());
        
        $q->bindValue(':receiptsId', $receiptAppData->getReceiptsId());
        $q->bindValue(':cookerId', $receiptAppData->getCookerId());
        $q->bindValue(':name', $receiptAppData->getName());                      
        $q->bindValue(':quantity', $receiptAppData->getQuantity());            
        $q->execute();     

         echo"<script language='javascript'>alert(' New Ingredient Added Successfuly!')</script>";       
    }
        
    
    // Method to List all Existing Ingredients    
    function list_receipt() 
    {
        $resul = $this->_db->query(" SELECT ingredient.*, receipts.receiptsId, receipts.name, cookers.cookerId, cookers.name FROM ingredient, receipts, cookers WHERE (ingredient.receiptsId = receipts.receiptsId) AND (ingredient.cookerId = cookers.cookerId) ORDER BY receiptsId DESC ") or die(mysql_error());
        while ($rec = $resul->fetch()) 
        {
            ?>
            <tr> 
               <td> 
            <?php

            echo" 
                 <img src='../img/books/books/".$rec["bookPic"]."' width = 50px> </td><td>" . $rec["title"] . "</td> <td>" . $rec["namePadf"] . "</td><td>" . $rec["dateUploaded"] . "</td><td> 
               <a data-rel='tooltip' title='View Book`s PDF' data-placement='top' class='green' href=../Admin/indexAdmin.php?page=" . base64_encode('../Admin/Books/viewBooks_PDF') . "&idr=" . base64_encode($rec["idBookPdf"]) . ">   
                       <i class='ace-icon fa fa-search bigger-130'></i>
                 </a>
                  </td>
               </tr> ";
        }
    }
    
    // Method to update an Existing Ingredient
    
    public function update_receipt($receiptAppData) 
    {
        
       $resul = $this->_db->query(" SELECT * FROM ingredient WHERE ingredientId = '" . $receiptAppData->getIngredientId(). "' ") or die(mysql_error());
       $reqt = $resul->fetch();

        if ($reqt != NULL) 
        {
            $q = $this->_db->prepare(" UPDATE ingredient SET receiptsId = :receiptsId, cookerId = :cookerId, name = :name, quantity = :quantity WHERE receiptsId = '".$reqt['receiptsId']."' ") or die(mysql_error());
        
            $q->bindValue(':receiptsId', $receiptAppData->getReceiptsId());
            $q->bindValue(':cookerId', $receiptAppData->getCookerId());
            $q->bindValue(':name', $receiptAppData->getName());                      
            $q->bindValue(':quantity', $receiptAppData->getQuantity());            
            $q->execute();          
            
             echo"<script language='javascript'>alert(' Ingredient Updated Successfuly!')</script>";
        }
        else 
        {
            echo"<script language='javascript'>alert('Ingredient does not Exists !')</script>";           
        }
    }
    
  

}
