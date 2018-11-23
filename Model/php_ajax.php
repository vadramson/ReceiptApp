<?php

@include("../Model/db.php");

$db = new AbcSHOP();

if (isset($_POST["RmvPdt"])) 
 {
    $idursPur = trim($_POST["idursPur"]);
    
    $resulQty = $db->bdd->query(" SELECT urspurchase.*, product.idProduct, quantity FROM urspurchase, product WHERE urspurchase.idProduct = product.idProduct AND idursPur = '".$idursPur."' ") or die(mysql_error());
    $recQty = $resulQty->fetch();

    $Qty = $recQty["urspurQty"];
    $ActQty = $recQty["quantity"];
    $idProduct = $recQty["idProduct"];

    $newQTY = $Qty + $ActQty;

    $db->bdd->query(" delete from urspurchase where  idursPur = '" . $idursPur . "' ") or die(mysql_error());
    $db->bdd->query(" update product set quantity = '" . $newQTY . "' where idProduct = '" . $idProduct . "' ") or die(mysql_error());
//    echo "success";
}

?>