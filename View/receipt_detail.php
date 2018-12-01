<?php
if (isset($_REQUEST["idr"])) {
    $receiptsId = $_REQUEST['idr'];

    $bdd = new RECEIPT();
    $resul = $bdd->bdd->query(" SELECT * FROM receipts WHERE receiptsId = '" . $receiptsId . "' ")or die(mysql_error());
    $rowx = $resul->fetch();

    $resulIngredient = $bdd->bdd->query(" SELECT * FROM ingredient WHERE receiptsId = '" . $receiptsId . "' ")or die(mysql_error());
}
?>  
<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">           
            <li style="font-weight: bolder;" class="page_title"><i class="fa fa-cutlery"></i> <?php echo $rowx["name"]; ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="row" id="productMain">
            <div class="col-sm-4">
                <div id="mainImage1">
                    <img src="View/image/receipts_img/<?php echo $rowx["image"]; ?>" alt="" class="img-responsive">
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-clock-o"></i> <?php echo $rowx["duration"]; ?> mins
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-user"></i> <?php echo $rowx["guest"]; ?> persons
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="ribbon new">
                    <div class="theribbon"><i class="fa fa-cutlery"></i></div>
                    <div class="ribbon-background"></div>
                </div>                
            </div>
            <div class="col-sm-8">
                <div class="box">                                        
                    <div class="row"> 
                        <?php echo $rowx["description"]; ?>                       
                    </div>
                    <p class="goToDescription"><a href="#ingredients" class="scroll-to">Scroll down to Ingredients</a></p>
                </div>
                <div class="row" id="thumbs">
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="View/image/receipts_img/<?php echo $rowx["image"]; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="View/image/receipts_img/<?php echo $rowx["image"]; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="View/image/receipts_img/<?php echo $rowx["image"]; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box" id="ingredients">                        
            <h4>Ingredients</h4>           
            <hr>            
            <blockquote>
                <ul>
                    <?php
                    while ($ingredient = $resulIngredient->fetch()) {
                        ?>                    
                        <li><a href="#"><?php echo $ingredient["quantity"] . ' '; ?></a> <?php echo $ingredient["unit"] . ' of ' . $ingredient["name"]; ?> </li>                    
                        <?php
                    }
                    ?>
                </ul>                
            </blockquote>                                                       
        </div>
    </div>
</div>