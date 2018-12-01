<?php
@include("../Model/db.php");

$db = new RECEIPT();

if (isset($_POST["deactivate"])) 
 {
    $receiptsId = trim($_POST["receiptsId"]);        
    $db->bdd->query(" update receipts set receipt_status = 'Deactivate' where receiptsId = '" . $receiptsId . "' ") or die(mysql_error());
}

if (isset($_POST["favorite"])) 
 {
    $cookerId = $_POST["cookerId"];   
    $receiptsId = $_POST["receiptsId"];   

    $resulQty = $db->bdd->query(" SELECT favoritesId FROM favorites WHERE cookerId = '" . $cookerId . "' AND receiptsId = '".$receiptsId."' ") or die(mysql_error());
    $recQty = $resulQty->fetch();
    
    $response =  $recQty;
    file_put_contents($filename = 'see.txt', $response);

    if($recQty['favoritesId'] == NULL){
        
    $db->bdd->query(" INSERT INTO favorites SET cookerId = '" . $cookerId . "', receiptsId = '".$receiptsId."' ") or die(mysql_error());
    echo 'Receipt Added to list of favorites';
    }
 else {
        echo 'Receipt is already in favorite list';
    }
}

if (isset($_POST["remove_favorite"])) 
 {
    $favoritesId = $_POST["favoritesId"];
    $resulQty = $db->bdd->query(" DELETE FROM favorites WHERE favorites.favoritesId = '".$favoritesId."' ") or die(mysql_error());
    echo 'Receipt removed from your favorite list';
 }


?>