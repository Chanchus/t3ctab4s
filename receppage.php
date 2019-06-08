

<?php
    

    $errormsgcart = "";
    $errormsgbrand = "";

    if (isset($_GET['error']))
    {
        if ($_GET['error']=="emptyfieldscart")
        {
            $errormsgcart = "There are empty fields!";
        }
        elseif ($_GET['error']=="cartalreadyexists")
        {
            $errormsgcart = "The BagCart already exists!";
        }
        elseif ($_GET['error']=="branddoesntexists")
        {
            $errormsgcart = "The model does not exist!";
        }
        elseif ($_GET['error']=="emptyfieldsbrand")
        {
            $errormsgbrand = "There are empty fields!";
        }
        elseif ($_GET['error']=="brandalreadyexists")
        {
            $errormsgbrand = "The model already exists!";
        }
        
    }


?>

<?php require 'navbar.php'; ?>





<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:80px> Overview </h1>
    
    <br><br>

    <div class="row">
        <a href="createclient.php" class="btn btn-info btn-lg" id="menubtn"> Register Client</a>
        
        <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a>
        
    </div>


    <br>
</div>