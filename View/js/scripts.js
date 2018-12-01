function deactivate_receipt(receiptsId)
{
    var rsp = confirm(" Are you sure you want to Delete this Receipt  ? ");
    if (rsp == true)
    {
        console.log("Sent " + receiptsId);
        $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        deactivate: 'deactivate',
                        receiptsId: receiptsId
                    },
                    success: function () {
                        
                         alert("Receipt Deleted ");
                            setTimeout(function() {
                            window.location.href = "index.php?page=Vmlldy9teV9yZWNlaXB0cw==";
                          }, 20);
                            console.log(receiptsId);
                    },
                    error: function (error){
                        alert('Error: '+ error);
                    } 
                });
    }
    else
    {
        alert("No ID"+ receiptsId);
    }
    
}    


function add_favorite(receiptsId, cookerId)
{
    var rsp = confirm(" Are you sure you want to Add this Receipt to your Favorites ? ");
    if (rsp == true)
    {
        console.log("Sent " + receiptsId + " Then " + cookerId);
        $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        favorite: 'favorite',
                        receiptsId: receiptsId,
                        cookerId: cookerId
                    },
                    success: function (data) {
                        
                         alert(data);
                            setTimeout(function() {
                            window.location.href = "index.php?page=Vmlldy9teV9mYXZvcml0ZXM=";
                          }, 20);
                            console.log(receiptsId);
                    },
                    error: function (error){
                        alert('Error: '+ error);
                    } 
                });
    }
    else
    {
        alert("No ID"+ receiptsId);
    }
    
}    

function remove_favorite(favoritesId)
{
    var rsp = confirm(" Are you sure you want to Remove this Receipt to your Favorites ? ");
    if (rsp == true)
    {
        console.log("Sent " + favoritesId);
        $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        remove_favorite: 'remove_favorite',
                        favoritesId: favoritesId                        
                    },
                    success: function (data) {
                        
                         alert(data);
                            setTimeout(function() {
                            window.location.href = "index.php?page=Vmlldy9teV9mYXZvcml0ZXM=";
                          }, 20);
                            console.log(favoritesId);
                    },
                    error: function (error){
                        alert('Error: '+ error);
                    } 
                });
    }
    else
    {
        alert("No ID"+ receiptsId);
    }
    
}    



