<?php

class FavoriteManager 
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

    // Method to add new Favorites
    
    function add_favorite($receiptAppData) 
    {
        $q = $this->_db->prepare("INSERT INTO favorites SET cookerId = :cookerId,receiptsId = :receiptsId ") or die(mysql_error());
        
        $q->bindValue(':receiptsId', $receiptAppData->getReceiptsId());
        $q->bindValue(':cookerId', $receiptAppData->getCookerId());                   
        $q->execute();     

         echo"<script language='javascript'>alert(' New Favorite Added Successfuly!')</script>";       
    }
        
    
    // Method to List all Existing Favorites
    function list_favorites() 
    {
        $resul = $this->_db->query(" SELECT favorites.*, receipts.receiptsId, receipts.name, receipts.image FROM favorites, receipts WHERE favorites.receiptsId = receipts.receiptsId ORDER BY favoritesId DESC ") or die(mysql_error());
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
    
    // Method to Delete an Existing Favorite
    
    public function remove_favorites($receiptAppData) 
    {
            $q = $this->_db->prepare(" DELETE FROM favorites WHERE favoritesId = '".$receiptAppData->getFavoritesId()."' ") or die(mysql_error());        
             echo"<script language='javascript'>alert(' Favorite Deleted Successfuly!')</script>";
     
    }
    
  

}
