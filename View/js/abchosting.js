function myWallet(wallet)
{      
    alert("Your Balance is " + wallet + "$");  
}


function rmv_pdt(idursPur)
{
    var rsp = confirm(" Are you sure you want to REMOVE product from CART  ? ");
    if (rsp == true)
    {
        
        $.ajax
                ({
                    type: 'post',
                    url: '../../Model/php_ajax.php',
                    data: {
                        RmvPdt: 'RmvPdt',
                        idursPur: idursPur
                    },
                    success: function (response) {
                        
                         alert("Product Removed From Cart ");
                            setTimeout(function() {
                            window.location.href = "../../View/users/indexUser.php?page=dmlld1Byb2R1Y3Rz";
                          }, 20);
                            console.log(idursPur);
                        
//                        if (response == "success")
//                        {
//                            alert("Product Removed From Cart ");
//                            setTimeout(function() {
//                            window.location.href = "../../View/users/indexUser.php?page=dmlld1Byb2R1Y3Rz"; // Rredirection to the targeted page
//                          }, 20);
//                            console.log(idursPur);
//                        }
//                        else
//                        {
//                            console.log("Error");
//                        }
                    }
                    
                });
    }
    else
    {
        alert("No I am not ... "+ idursPur);
    }
    
}    



