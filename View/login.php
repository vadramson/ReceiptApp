 <?php
    session_start();
    include_once('Model/db.php');

if (isset($_POST['login'])) {
   
   $login = addslashes(htmlspecialchars(trim($_POST['username'])));
   $pass = sha1(addslashes(htmlspecialchars(trim(($_POST['password'])))));
    
    $bdd = new RECEIPT();    
    
    /*    Query to get name and other stuffs about user    */
    
    $test = $bdd->bdd->query("SELECT * FROM cookers WHERE (email ='" . $login . "' && password ='" . $pass . "') && status = 'Active'  ") or die(mysql_error());
    $reqt = $test->fetch();        

    if ($reqt == NULL) 
     {        
        echo "<script language = 'javascript'> alert ('Wrong Username or Password ! !')</script>";
        
     } 
     else 
     {
        $_SESSION["cookerId"] = $reqt["cookerId"];
        $_SESSION["name"] = $reqt["name"];                
//        header("Location:View/Admin/indexAdmin.php");           
     }
}
?>

<header>
    <img src="View/image/logo.png" class="company-logo">               
    <div class="welcome">
        <?php echo date("d-M-Y h:i:sa"); ?>
    </div>
</header>
<nav>
    <a href="#"> <span class="_title"> Wellcome To ABC Hosting Shop Admin Panel</span></a>
    <a href="index.php?page=<?php echo base64_encode('View/login');?>" style="float: right;"> Login </a>                
</nav>
<main>
    <div class="login_">        
        <form class="login_form" name="login" action="#" method="POST">
            <label>Username</label>
            <input required type="text" name="username">
            <label>Password</label>
            <input required type="password" name="password">
            <input type="submit" name="login" value="Login">
        </form>        
    </div>
</main>
<?php
if (isset($_GET["lock"]))
{
    session_unset();
    session_destroy();
    header("Location:../");
    exit();
}
?>