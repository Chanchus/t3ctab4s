

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
    
    <h1 style=font-size:60px> Overview | Receptionist</h1>
    
    
    <br><br>

    <div class="row">
        <a href="createclient.php" class="btn btn-info btn-lg" id="menubtn"> Register Client</a>
        
        <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a>
        
    </div>


    <br>
</div>



<div class="container" style="margin-top:20px;" id="add-form">
    <h1> BagCarts</h1>  <hr style="border-color:#aaaaaa;">
    <div class="row">
        <div class="col-sm-5">
            <h4> Add a new BagCart </h4>
            <form action="addbagcart.php" method="post">

                <div class="form-group">
                    <label><h6>Cart ID</h6> </label>
                    <input type="text" name="addcart-id"  class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label><h6>Model</h6> </label>
                    <input type="text" name="addcart-model"  class="form-control" placeholder="Enter Last Name">
                </div>
                
                <div class="form-group">
                    <label><h6>Brand</h6>
                    <select class="form-control" name="addcart-brand">
                        <!-- <option value="aero">AERO</option>
                        <option value="tld">TLD</option>
                        <option value="parkan">Par-Kan</option>
                        <option value="iscar">ISCAR GSE</option>
                        <option value="ersel">Ersel Technology</option>
                        <option value="usimat">Usimat Sermees</option>
                        <option value="viking">Viking Trailers International</option> -->

                        <?php
                            $url = "https://tabaswebapi.azurewebsites.net/getmarcaforlist";

                            $eljson = file_get_contents($url);


                            $array = json_decode($eljson, true);
                            $index = 0;
        
                    
                            while($index < sizeof($array))
                            {
                                echo "<option value=".$array[$index]['tmarca'].">".$array[$index]['tmarca']."</option>";

                    
                                $index ++;

                                
                            }
                            
                        ?>    

                    </select>
                    
                    
                    <?php
                    echo
                    '<br> <p class="text-warning">';
                    echo                
                     "$errormsgcart </p>";

                     ?>


                </div>
        
                <button type="submit" name="addcartsubmit" class="btn btn-info"> Add Cart </button>
            </form>
            <hr style="border-color:#aaaaaa;">
            <br>
            <h4> Add a new Cart Brand </h4>
            <form action="addcartbrand.php" method="post" >

                <div class="form-group">
                    <label><h6>Brand</h6> </label>
                    <input type="text" name="addbrand-brand" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label><h6>Model</h6> </label>
                    <input type="text" name="addbrand-model"  class="form-control" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label><h6>Capacity</h6> </label>
                    <input type="text" name="addbrand-capacity"  class="form-control" placeholder="Enter Last Name">
                </div>
                
                <?php
                    echo
                    '<br> <p class="text-warning">';
                    echo                
                     "$errormsgbrand </p> <br>";

                     ?>

        
                <button type="submit" name="addbrandsubmit" class="btn btn-info"> Add Brand </button>
            </form>


        </div>
        <div class="col-sm-1">
        </div>

        <div class="col-sm-5">
            <h4> Existing BagCarts </h4>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getbagcart";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "ID: ". $array[$index]['tid'] ."<br>";
                        echo "Brand: ". $array[$index]['tmarca'] ."<br>";
                        echo "Model: ". $array[$index]['tmodelo'] ."<br>";
                        echo "</div>";

                        $index ++;
                    }
                    
            ?>        
                
                
            

            <!-- <div>
                <form method="POST" action="mainpage.php">
                    <button type="submit" class="btn btn-info" name="get"> GET </button>
                    <?php
                


                    ?>
                </form>
            </div> -->

        </div>
    </div>

    

</div>
