<?php

class ReceiptManager 
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

    // Method to add new Receipts
    
    function add_receipt($receiptAppData) 
    {

        $resul = $this->_db->query(" SELECT * FROM receipts WHERE name = '" . $receiptAppData->getName(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) 
        {
            $q = $this->_db->prepare("INSERT INTO receipts SET cookerId = :cookerId, name = :name, duration = :duration, description = :description, guest = :guest, image = :image ") or die(mysql_error());

            $q->bindValue(':cookerId', $receiptAppData->getCookerId());
            $q->bindValue(':name', $receiptAppData->getName());
            $q->bindValue(':duration', $receiptAppData->getDuration());            
            $q->bindValue(':description', $receiptAppData->getDescription());            
            $q->bindValue(':guest', $receiptAppData->getGuest());            
            $q->bindValue(':image', $receiptAppData->getImage());            
            $q->execute();     
            
             echo"<script language='javascript'>alert(' New Receipt Added Successfuly!')</script>";
        }
        else 
        {
            echo"<script language='javascript'>alert('Redondance Receipt Exists already!')</script>";
           
        }
        
    }
        
    
    // Method to List all Existing Receipts    
    function list_receipt() 
    {
        $resul = $this->_db->query(" SELECT receipts.*, cookers.cookerId, cookers.name FROM receipts, cookers WHERE receipts.cookerId = cookers.cookerId ORDER BY receiptsId DESC ") or die(mysql_error());
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
    
    // Method to update an Existing Receipt
    
    public function update_receipt($receiptAppData) 
    {
        
       $resul = $this->_db->query(" SELECT * FROM receipts WHERE receiptsId = '" . $receiptAppData->getReceiptsId(). "' ") or die(mysql_error());
       $reqt = $resul->fetch();

        if ($reqt != NULL) 
        {
            $q = $this->_db->prepare("UPDATE receipts SET  name = :name, duration = :duration, description = :description, guest = :guest, image = :image WHERE receiptsId = '".$reqt['receiptsId']."' ") or die(mysql_error());            
            $q->bindValue(':name', $receiptAppData->getName());
            $q->bindValue(':duration', $receiptAppData->getDuration());            
            $q->bindValue(':description', $receiptAppData->getDescription());            
            $q->bindValue(':guest', $receiptAppData->getGuest());            
            $q->bindValue(':image', $receiptAppData->getImage());            
            $q->execute();     
            
             echo"<script language='javascript'>alert(' Receipt Updated Successfuly!')</script>";
        }
        else 
        {
            echo"<script language='javascript'>alert('Receipt does not Exists !')</script>";           
        }
    }
    
  

}
