<?php
    session_start();

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
    </head>
    
    <body>
        <div class="container">
            <?php
                    if (isset($_REQUEST["page"])) 
                    {
                        $page = base64_decode($_REQUEST["page"]) . ".php";
                        if (file_exists($page)) 
                        {
                            @include($page);
                        }
                        else
                        {
                            header("location: View/404.php ");                            
                        }
                    }
                    else
                    {                                  
                        @include('View/main.php');
                    }
                    ?>
            
            <footer>
                <p> &copy;2018 Receipts App | Developed By Vadrama NDISANG </p>
            </footer>
        </div>
</body>    
</html>
