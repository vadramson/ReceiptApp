<?php

if (isset($_POST["search_receipt"])) 
{    
    $srchReceipt = clean($_POST["search"]);
    $concatenate = "";
    $RawSearchReceipt = $srchReceipt;
    $srchReceipt = preg_split('/[\s]+/', $srchReceipt);
    $total_result = count($srchReceipt);
                
    foreach ($srchReceipt as $key => $srchReceipts) 
    {
        $concatenate .= " name LIKE '%$srchReceipts%' ";
        if ($key != ($total_result - 1)) 
        {
            $concatenate .= "AND";
        }
    }
//    $concatenate = " name LIKE '%$srchReceipt%' ";
}

$bdd = new RECEIPT();
$resulReceiptsQt = $bdd->bdd->query("SELECT COUNT(receiptsId) AS receiptsId FROM receipts WHERE receipt_status = 'Active' AND ($concatenate) ") or die(mysql_error());

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

$resulReceipts = $bdd->bdd->query(" SELECT receipts.*, favorites.favoritesId AS fav, favorites.cookerId AS cookID FROM receipts LEFT JOIN favorites ON receipts.receiptsId=favorites.receiptsId WHERE receipts.receipt_status = 'Active' AND ($concatenate) GROUP BY receiptsId  DESC LIMIT {$start},{$per_page} ") or die(mysql_error());

?>

<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">            
            <li style="font-weight: bolder;" class="page_title"><i class="fa fa-fighter-jet"></i> RECEIPTS RESULTS SEARCH</li>
        </ul>                

        <div class="row products">
            <?php
            while ($req = $resulReceipts->fetch()) {
                ?>

                <div class="col-md-3 col-sm-3">
                    <div class="gallery row_x">
                        <a href="index.php?page=<?php echo base64_encode('View/receipt_detail').'&idr=' .  $req["receiptsId"]; ?>" class="receipt_img">
                            <img src="View/image/receipts_img/<?php echo $req["image"]; ?>" class=" img-thumbnail img-responsive">
                            <?php // echo $req["fav"]; ?>
                            <?php // echo $req["cookID"]; ?>
                        </a>
                        <div class="desc">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-10"><?php echo $req["name"]; ?></div>
                                    <?php 
                                    if (isset($_SESSION["cookerId"]) or isset($_SESSION["name"])) {
                                        
                                    if($req["cookID"] == $cookerId){
                                    ?>
                                    <div class="col-sm-2 fav"><i class="fa fa-star"></i></div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION["cookerId"]) or isset($_SESSION["name"])) {
                               ?>                                 
                            <hr>
                            <div class="col-sm-12">
                                <div class="row">
                                    <?php
                                    if($_SESSION["cookerId"] == $req["cookerId"]){
                                        ?>
                                    <div class="col-sm-4 func"><a href="index.php?page=<?php echo base64_encode('View/edit_receipt').'&idr=' .  $req["receiptsId"]; ?>" title="Edit Receipt"><i class="fa fa-edit"></i></a></div>
                                    <div class="col-sm-4 func"><a href="#" onclick="deactivate_receipt('<?php echo $req["receiptsId"]; ?>')" title="Delete this Receipt"><i class="fa fa-eject"></i></a></div>
                                    <?php
                                    }
                                    ?>     
                                    <?php 
                                    if($req["cookID"] == $cookerId){
                                    ?>
                                    <div class="col-sm-4 func"><a href="#" onclick="remove_favorite('<?php echo $req["fav"]; ?>')" title="Remove from my list of Favorites"><i class="fa fa-star-o"></i></a></div>
                                     <?php
                                    }
                                    else
                                    {
                                    ?>   
                                    <div class="col-sm-4 func"><a href="#" onclick="add_favorite('<?php echo $req["receiptsId"]; ?>' , '<?php echo $req["cookerId"]; ?>')" title="Add to my List of Favorites"><i class="fa fa-star"></i></a></div>
                                    <?php
                                    }
                                    ?> 
                                </div>
                            </div>
                            <?php
                              }
                            ?>
                        </div>
                    </div>

                    <!-- /.product -->
                </div>
                <?php
            }
            ?>        
        </div> 
        <div class="row" style="padding: 25px;">
            <?php
            if($i >= 8){
            $p = 1;
            echo 'Page : ';
            for ($p = 1; $p <= $nbp; $p++) {

                if ($p == $pagvef) {
                    echo $p;
                } else {
                    ?>
                    <a href="index.php?page=<?php echo base64_encode('View/main'); ?>&pagvef=<?php echo $p; ?> " class="btn-success btn-xs" ><?php echo $p; ?></a>         
                    <?php
                }
            }
            }
            ?>
        </div>
    </div>
</div>