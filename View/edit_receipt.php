<?php
if (isset($_REQUEST["idr"])) {
    $receiptsId = $_REQUEST['idr'];

    $bdd = new RECEIPT();
    $resul = $bdd->bdd->query(" SELECT * FROM receipts WHERE receiptsId = '" . $receiptsId . "' ")or die(mysql_error());
    $rowx = $resul->fetch();

}
?>  


<form action="index.php?page=<?php echo base64_encode('View/main'); ?>" method="POST" enctype="multipart/form-data">                    
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group col-sm-6">
                <label>Name</label>
                <input type="text" name="name" required value="<?php echo $rowx["name"]; ?>" class="form-control" id="name" placeholder="Receipt Name">                        
            </div>
            <div class="form-group col-sm-6">
                <label>Duration</label>
                <input type="number" min="0" value="<?php echo $rowx["duration"]; ?>" name="duration" required class="form-control" id="duration" placeholder="Duration in Minutes">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">                            
            <div class="form-group col-sm-6">
                <label>Image</label>
                <input type="file"  value="<?php echo $rowx["image"]; ?>" name="image"  class="form-control" id="image">
                <input type="hidden" value="<?php echo $rowx["image"]; ?>" name="new_image">
                <input type="hidden" value="<?php echo $rowx["receiptsId"]; ?>" name="receiptsId">
            </div>
            <div class="form-group col-sm-6">
                <label>Guest</label>
                <input type="number" min="0" value="<?php echo $rowx["guest"]; ?>" name="guest" required class="form-control" id="guest" placeholder="Number of Guest">                                        
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group col-sm-3">                                
                Current Image<br>
                <img src="View/image/receipts_img/<?php echo $rowx["image"]; ?>" class=" img-thumbnail img-responsive">
            </div>
            <div class="form-group col-sm-9">                                                      
                <textarea name="description" placeholder="Description..." class="ckeditor" >
<?php echo $rowx["description"]; ?>
                </textarea>                            
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit" name="updateReceipt"><i class="fa fa-save"></i> Update Receipt</button>
    </div>
</form>

