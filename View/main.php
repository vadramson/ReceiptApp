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

$resulReceipts = $bdd->bdd->query(" SELECT receipts.*, favorites.favoritesId AS fav, favorites.cookerId AS cookID FROM receipts LEFT JOIN favorites ON receipts.receiptsId=favorites.receiptsId WHERE receipts.receipt_status = 'Active' GROUP BY receiptsId  DESC LIMIT {$start},{$per_page} ") or die(mysql_error());

if (isset($_POST['updateReceipt'])) {
        
        $bdd = new RECEIPT();
        
        $picture = $_FILES['image']['name'];
        $picture_temp = $_FILES['image']['tmp_name'];
        
        $new_image = clean($_POST['new_image']);
        
        if(empty($picture))
        {
            $picture = $new_image;
        } 
        else 
        {
            $picture = $picture;
        }        
        
        // Get the extension of the uploaded picture
        if (!empty($picture)) {            
            $image = explode('.', $picture); // split the name of picture into two based on extension with the full stop (.) delimiter
            $image_extension = end($image); // get the end or extension  of the image            
            if (in_array(strtolower($image_extension), array('png', 'gif', 'jpg', 'jpeg')) === false) {
                echo"<script language='javascript'>alert('Choose a Valid Image!')</script>";
            } else {

                $rem = new ReceiptManager($bdd->bdd);
                $receipApp = new Receipts(array(
                    'receiptsId' => clean($_POST['receiptsId']),
                    'name' => clean($_POST['name']),
                    'duration' => clean($_POST['duration']),
                    'description' => clean($_POST['description']),
                    'guest' => clean($_POST['guest']),
                    'image' => $picture,
                ));
                
                move_uploaded_file($picture_temp, 'View/image/receipts_img/' . $picture);
                $rem->update_receipt($receipApp);
                   
            }
        }
 else {
     echo 'No Image';
 }
    }

?>

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
