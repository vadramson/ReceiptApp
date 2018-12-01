<?php
session_start();

if (isset($_SESSION["cookerId"]) or isset($_SESSION["name"])) {
    $cookerId = $_SESSION["cookerId"];
    $name = $_SESSION["name"];
}


include_once('Model/db.php');
include_once('Model/Cooker/Cooker.php');
include_once('Model/Cooker/CookerManager.php');
include_once('Model/Favorite/Favorite.php');
include_once('Model/Favorite/FavoriteManager.php');
include_once('Model/Ingredient/Ingredient.php');
include_once('Model/Ingredient/IngredientManager.php');
include_once('Model/Receipt/Receipt.php');
include_once('Model/Receipt/ReceiptManager.php');
?>
<html>
    <head>
        <title>Receipts App</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="View/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- styles -->
        <link href="View/css/font-awesome.css" rel="stylesheet">
        <link href="View/css/bootstrap.min.css" rel="stylesheet">
        <link href="View/css/animate.min.css" rel="stylesheet">
        <link href="View/css/owl.carousel.css" rel="stylesheet">
        <link href="View/css/owl.theme.css" rel="stylesheet">

        <link href="View/css/style.default.css" rel="stylesheet" id="theme-stylesheet">      
        <link href="View/css/custom.css" rel="stylesheet">

        <script src="View/js/respond.min.js"></script>        
        <script src="View/ckeditor/ckeditor.js"></script>
        <script src="View/ckeditor/style.js"></script>
        <script src="View/ckeditor/js/sample.js"></script>
        <link rel="stylesheet" href="View/ckeditor/css/samples.css">

        <link rel="shortcut icon" href="View/image/logo.png">

        <style>
            #search_sbt{
                width: 100%;
                height: 34px;
                margin-right: -7px;
            }

            #search_inpt{                
                margin-left: 9%;
            }

            .receiptImg-{
                width: 500px;
                height: 406px;
                border: 2px solid blue;
            }

            div.gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                /*width: 180px;*/
            }

            div.gallery:hover {
                border: 1px solid #777;
            }

            div.desc {
                padding: 5px;        
                color: white;                
            }

            div.row_x{
                color: white;
                background: rgba(0.9,0,0,0.7); 
            }

            .func{
                padding-bottom: 5px;
            }

            .receipt_img img{
                width: 300px;
                height: 180px;
            }

            .fav{
                position: relative;
                margin: auto;
            }

        </style>
    </head>

    <body>
        <div class="container">
            <nav>
                <a href="index.php"><img src="View/image/logo.png" class="company-logo img-circle" width="40" style="padding-top: 1%;"></a>                  
                <?php
                if (isset($_SESSION["cookerId"])) {
                    ?>
                    <a href="index.php?page=<?php echo base64_encode('View/main'); ?>" style=";"> <i class="fa fa-bookmark-o"></i> Receipts </a>                
                    <a href="index.php?page=<?php echo base64_encode('View/my_receipts'); ?>" style=";"> <i class="fa fa-anchor"></i> My Receipts </a>                
                    <a href="index.php?page=<?php echo base64_encode('View/my_favorites'); ?>" style=";"> <i class="fa fa-star-o"></i> Favorites </a>                                            
                    <a href="#"data-toggle="modal" data-target="#addReceipt-modal"> <i class="fa fa-plus"></i> Add Receipts </a>                
                    <a href="#"data-toggle="modal" data-target="#addIngredient-modal"> <i class="fa fa-plus-circle"></i> Add Ingredients </a>                
                    <a type="button" class="btn navbar-btn" data-toggle="collapse" data-target="#search"> <i class="fa fa-search"></i> </a>
                    <a href="index.php?lock" style=";"> <i class="fa fa-sign-out"></i> Logout </a>
                    <?php
                    if (empty($_SESSION["picture"])) {
                        ?>
                        <a href="#" style="float: right;"> <img src="View/image/default.png" width="48" height="48" class="img-circle img-responsive" >  </a>                
                        <?php
                    } else {
                        ?>
                        <a href="#" style="float: right;"> <img src="View/image/user_img/<?php echo $_SESSION["picture"] ?>" width="48" height="48" class="img-circle img-responsive" title="<?php echo $_SESSION["name"] ?>">  </a>                
                        <?php
                    }
                    ?>            
                    <div class="collapse clearfix col-sm-11" id="search">
                        <form class="navbar-form" method="post" action="index.php?page=<?php echo base64_encode("View/receipt_search"); ?>" role="search">
                            <div class="input-group col-sm-12">
                                <input type="text" required class="form-control" id="search_inpt" name="search" placeholder="Search Receipts...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search_receipt" id="search_sbt" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>                   
                        </form>
                    </div>
    <?php
} else {
    ?>
                    <a href="#"data-toggle="modal" data-target="#login-modal"  style="float: right;"> <i class="fa fa-sign-in"></i> Login </a>                
                    <a href="#"data-toggle="modal" data-target="#signup-modal"  style="float: right;"> <i class="fa fa-lock"></i> Signup </a>                            
                    <?php
                }
                ?>

            </nav>

            <div id="all">

                <div id="content">            
<?php
if (isset($_REQUEST["page"])) {
    $page = base64_decode($_REQUEST["page"]) . ".php";
    if (file_exists($page)) {
        @include($page);
    } else {
        header("location: View/404.php ");
    }
} else {
    @include('View/main.php');
}

include_once('View/modals.php');
?>

                    
                </div>
            </div>
<footer class="col-sm-12">
    <p> &copy;2018 Receipts App | Developed By Vadrama NDISANG </p>
</footer>
            <script src="View/js/jquery-1.11.0.min.js"></script>
            <script src="View/js/scripts.js"></script>
            <script src="View/js/bootstrap.min.js"></script>
            <script src="View/js/jquery.cookie.js"></script>
            <script src="View/js/waypoints.min.js"></script>
            <script src="View/js/modernizr.js"></script>
            <script src="View/js/bootstrap-hover-dropdown.js"></script>
            <script src="View/js/owl.carousel.min.js"></script>
            <script src="View/js/front.js"></script>                   
    </body>    
<?php
if (isset($_GET["lock"])) {
    session_unset();
    session_destroy();
    header("Location:./");
    exit();
}
?>    
</html>