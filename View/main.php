<?php
$bdd = new RECEIPT();    
$resulReceiptsQt = $bdd->bdd->query("SELECT COUNT(receiptsId) AS receiptsId FROM receipts WHERE receipt_status = 'Active' ") or die(mysql_error());

$recP = $resulReceiptsQt->fetch();
$i = $recP['receiptsId'];
$nbp = ceil($i / 8);

if (isset($_GET['pagvef'])) {
    $pagvef = $_GET['pagvef']; 
} else { 
    $pagvef = 1; 
}
$start = ($pagvef - 1) * 8;
$per_page = (int) 8;

$resulReceipts = $bdd->bdd->query(" SELECT * FROM receipts WHERE receipt_status = 'Active' ORDER BY receiptsId DESC LIMIT {$start},{$per_page} ") or die(mysql_error());


?>

<style>
    .receiptImg-{
        width: 500px;
        height: 406px;
        border: 2px solid blue;
    }
    
</style>

<div class="container">

    <div class="col-md-12">
                
        <ul class="breadcrumb">            
            <li style="font-weight: bolder;" class="page_title"><i class="fa fa-fighter-jet"></i> RECEIPTS </li>
        </ul>                
        
        <div class="row products">
            <?php
                while ($req = $resulReceipts->fetch()) {
            ?>
            
            <div class="col-md-3 col-sm-3">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="index.php?page=<?php echo base64_encode('View/pages/bookDetail').'&idr=' . $req["receiptsId"]; ?>">
                                    <img src="View/image/receipts_img/<?php echo $req["image"];?>" alt="" class="img-responsive receiptImg">
                                </a>
                            </div>
                            <div class="back">
                                <a href="index.php?page=<?php echo base64_encode('View/pages/bookDetail').'&idr=' . $req["receiptsId"]; ?>">
                                    <img src="View/image/receipts_img/<?php echo $req["image"];?>" alt="" class="img-responsive receiptImg">
                                </a>
                            </div>
                        </div>
                        <br>
                    </div>                    
                    <div class="text">
                        <h3><a href="index.php?page=<?php echo base64_encode('View/pages/bookDetail').'&idr=' .  $req["receiptsId"]; ?> "><?php echo $req["name"];?></a></h3>                        
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>
    <?php
}

?>        
</div> 
        <div class="row" style="padding: 25px;">
   <?php
$p = 1;
echo 'Page : ';
for ($p = 1; $p <= $nbp; $p++) {

    if ($p == $pagvef) {
        echo $p;
    } else {
//        echo "  <a href = '?page={$p}' class='btn-danger btn-xs' >" . $p . "</a>";
        ?>
         <a href="index.php?page=<?php echo base64_encode('View/pages/books'); ?>&pagvef=<?php echo $p; ?> " class="btn-success btn-xs" ><?php echo $p; ?></a>         
     <?php    
    }        
}
?>
