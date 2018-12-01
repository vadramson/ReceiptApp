
<!--Receipt Modal Starts-->
<div class="modal fade" id="addReceipt-modal" tabindex="-1" role="dialog" aria-labelledby="Add Receipt" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Add New Receipt</h4>
            </div>
            <div class="modal-body">                
                <form action="#" method="POST" enctype="multipart/form-data">                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label>Name</label>
                                <input type="text" name="name" required class="form-control" id="name" placeholder="Receipt Name">                        
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Duration</label>
                                <input type="number" min="0" name="duration" required class="form-control" id="duration" placeholder="Duration in Minutes">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">                            
                            <div class="form-group col-sm-6">
                                <label>Image</label>
                                <input type="file"  name="image" required class="form-control" id="image">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Guest</label>
                                <input type="number" min="0" name="guest" required class="form-control" id="guest" placeholder="Number of Guest">                        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3">                                
                                Image Preview
                            </div>
                            <div class="form-group col-sm-9">                                                      
                                <textarea name="description" placeholder="Description..." class="ckeditor" ></textarea>                            
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="addReceipt"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Receipt Modal Ends-->

<!--Signup Modal Starts-->
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="Signup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">User Signup</h4>
            </div>
            <div class="modal-body">                
                <form action="#" method="POST" enctype="multipart/form-data">                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label>Name</label>
                                <input type="text" name="name" required class="form-control" id="name" placeholder="Full Name">                        
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email"  name="email" required class="form-control" id="email" placeholder="Email ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">                            
                            <div class="form-group col-sm-6">
                                <label>Profile Picture</label>
                                <input type="file"  name="picture" required class="form-control" id="picture">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Password</label>
                                <input type="password" name="password" required class="form-control" id="Password" placeholder="Your Password">                        
                            </div>
                        </div>
                    </div>                    
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="userSignup"><i class="fa fa-opera"></i> Sign me Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Signup Modal Ends-->

<!--Login Modal Starts-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">User Login</h4>
            </div>
            <div class="modal-body">                
                <form action="#" method="POST">                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="text" name="username" required class="form-control" id="username" placeholder="Email">                        
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Password</label>
                                <input type="password"  name="password" required class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                    </div>                    
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="login"><i class="fa fa-sign-in"></i> Loging</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Login Modal Ends-->

<!--Add Ingredient Modal Starts-->
<?php
    if(isset($_SESSION["cookerId"])){
        $bdd = new RECEIPT();
        $resulReceipts = $bdd->bdd->query(" SELECT * FROM receipts WHERE receipt_status = 'Active' AND cookerId = '".$cookerId."' ORDER BY receiptsId DESC ") or die(mysql_error());
    ?>    
<div class="modal fade" id="addIngredient-modal" tabindex="-1" role="dialog" aria-labelledby="Add Ingredient" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Add Ingredient</h4>
            </div>
            <div class="modal-body">                
                <form action="#" method="POST">                    
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label>Receipt</label>
                                <select name="receiptsId" required class="form-control">
                                    <?php
                                        while ($req = $resulReceipts->fetch()) {
                                    ?>
                                    <option value="<?php echo $req['receiptsId'];?>"><?php echo $req['name'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>    
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Ingredient</label>
                                <input type="text" name="name" required class="form-control" id="name" placeholder="Name of ingrdient">                        
                            </div>                            
                        </div>                         
                        <div class="col-sm-12">                            
                            <div class="form-group col-sm-6">
                                <label>Quantity</label>
                                <input type="number"  name="quantity" required min="0" class="form-control" id="quantity" placeholder="Quantity">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Unit of Measurement</label>
                                <input type="text" name="unit" required class="form-control" id="name" placeholder="e.g Kg, g, spoon, cup, packet">                        
                            </div>
                        </div>                        
                    </div>                    
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="addIngredient"><i class="fa fa-save"></i> Add Ingredient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
 }
?>
<!--Add Ingredient Modal Ends-->



<!--Modal Treatment Starts-->

<?php
//Add Receipt Starts Here

if (isset($_POST['addReceipt'])) {
    $bdd = new RECEIPT();

    $picture = $_FILES['image']['name'];
    $picture_temp = $_FILES['image']['tmp_name'];

    // Get the extension of the uploaded picture
    if (!empty($picture)) {
        $image = explode('.', $picture); // split the name of picture into two based on extension with the full stop (.) delimiter
        $image_extension = end($image); // get the end or extension  of the image            
        if (in_array(strtolower($image_extension), array('png', 'gif', 'jpg', 'jpeg')) === false) {
            echo"<script language='javascript'>alert('Choose a Valid Image!')</script>";
        } else {

            $rem = new ReceiptManager($bdd->bdd);
            $receipApp = new Receipts(array(
                'cookerId' => $cookerId,
                'name' => clean($_POST['name']),
                'duration' => clean($_POST['duration']),
                'description' => clean($_POST['description']),
                'guest' => clean($_POST['guest']),
                'image' => $picture,
            ));
            move_uploaded_file($picture_temp, 'View/image/receipts_img/' . $picture);
            $rem->add_receipt($receipApp);
        }
    }
}

//Add Receipt Ends Here

//User Signup Starts Here
if (isset($_POST['userSignup'])) {
    $bdd = new RECEIPT();

    $picture = $_FILES['picture']['name'];
    $picture_temp = $_FILES['picture']['tmp_name'];

    // Get the extension of the uploaded picture
    if (!empty($picture)) {
        $image = explode('.', $picture); // split the name of picture into two based on extension with the full stop (.) delimiter
        $image_extension = end($image); // get the end or extension  of the image            
        if (in_array(strtolower($image_extension), array('png', 'gif', 'jpg', 'jpeg')) === false) {
            echo"<script language='javascript'>alert('Choose a Valid Image!')</script>";
        } else {

            $rem = new CookerManager($bdd->bdd);
            $receipApp = new Cooker(array(                
                'name' => clean($_POST['name']),
                'password' => sha1(clean($_POST['password'])),
                'email' => clean($_POST['email']),                
                'picture' => $picture,
            ));
            move_uploaded_file($picture_temp, 'View/image/user_img/' . $picture);
            $rem->sign_up($receipApp);
        }
    }
}
//User Signup Ends Here

//User Login Starts Here
if (isset($_POST['login'])) {
    $bdd = new RECEIPT();

    $rem = new CookerManager($bdd->bdd);
    $receipApp = new Cooker(array(                        
        'password' => sha1(clean($_POST['password'])),
        'email' => clean($_POST['username']),                        
    ));            
    $rem->login($receipApp);
    header("Location:index.php");   
}
//User Login Ends Here

//Add Ingredient Starts Here
if (isset($_POST['addIngredient'])) {
    $bdd = new RECEIPT();

    $rem = new IngredientManager($bdd->bdd);
    $receipApp = new Ingredient(array(                        
        'cookerId' => $cookerId,
        'quantity' => clean($_POST['quantity']),
        'unit' => clean($_POST['unit']),
        'name' => clean($_POST['name']),
        'receiptsId' => clean($_POST['receiptsId']),                        
    ));            
    $rem->add_ingredient($receipApp);        
    
}
//Add Ingredient Ends Here

?>
<!--Modal Treatment Ends-->

