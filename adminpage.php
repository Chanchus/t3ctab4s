


<?php
    

    $errormsgcart = "";
    $errormsgbrand = "";
    $errormsgflight = "";

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
        elseif ($_GET['error']=="emptyfieldsflight")
        {
            $errormsgflight = "There are empty fields!";
        }
        
    }


?>

<?php require 'navbar.php'; ?>





<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:60px> Overview | Administrator </h1>
    
    <br><br>

    <div class="row">
        <a href="createuser.php" class="btn btn-info btn-lg" id="menubtn"> Register User</a>
        
        <!-- <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a> -->
        
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







<?php /////////////////////////////////////////////

      //      FLIGHTS
      /////////////////////////////////////////////
?>




<div class="container" style="margin-top:20px;" id="flights">
<h1> Flights</h1>  <hr style="border-color:#aaaaaa;">
    <div class="row">
        
        
        
        <div class="col-sm-4">
          
            
            <h4> Assign Airplane to Flight </h4>
            <form action="addescala.php" method="post">

                    

                <div class="form-group" name="departuredate">
                    <label><h6>Departure Date </h6> <h1 style=font-size:15px>(m/dd/yyyy hh:mm:ss AM/PM)</h1> </label>
                    <input type="text" name="addbrand-model"  class="form-control" placeholder="Enter Last Name">
                </div>
                
                <div class="form-group" name="arrivaldate">
                    <label><h6>Arrival Date</h6> <h1 style=font-size:15px>(m/dd/yyyy hh:mm:ss AM/PM)</h1> </label>
                    <input type="text" name="addbrand-model"  class="form-control" placeholder="Enter Last Name">
                </div>
                
                <div class="form-group">
                    <label><h6>Departure Airport</h6> 
                    <select class="form-control" name="departure">
                        <option value=""> </option>

                        <?php
                            $url = "https://tabaswebapi.azurewebsites.net/getaeropuerto";

                            $eljson = file_get_contents($url);


                            $array = json_decode($eljson, true);
                            $index = 0;
        
                    
                            while($index < sizeof($array))
                            {
                                echo "<option value=".$array[$index]['Codigo'].">".$array[$index]['Codigo']."</option>";

                    
                                $index ++;

                                
                            }
                            
                        ?>    

                    </select>
                    

                </div>

                <div class="form-group">
                    <label><h6>Arrival Airport</h6>
                    <select class="form-control" name="arrival">
                        <option value=""> </option>

                        <?php
                            $url = "https://tabaswebapi.azurewebsites.net/getaeropuerto";

                            $eljson = file_get_contents($url);


                            $array = json_decode($eljson, true);
                            $index = 0;
        
                    
                            while($index < sizeof($array))
                            {
                                echo "<option value=".$array[$index]['Codigo'].">".$array[$index]['Codigo']."</option>";

                    
                                $index ++;

                                
                            }
                            
                        ?>    

                    </select>
                    

                </div>
                <div class="form-group">
                    <label><h6>Airplane ID</h6>
                    <select class="form-control" name="planeid">
                        <option value=""> </option>

                        <?php
                            $url = "https://tabaswebapi.azurewebsites.net/getavion";

                            $eljson = file_get_contents($url);


                            $array = json_decode($eljson, true);
                            $index = 0;
        
                    
                            while($index < sizeof($array))
                            {
                                echo "<option value=".$array[$index]['tid'].">".$array[$index]['tid']."</option>";

                    
                                $index ++;

                                
                            }
                            
                        ?>    

                    </select>
                    

                </div>

                <div class="form-group">
                    <label><h6>Flight ID</h6>
                    <select class="form-control" name="flightid">
                        <option value=""> </option>

                        <?php
                            $url = "https://tabaswebapi.azurewebsites.net/getvuelo";

                            $eljson = file_get_contents($url);


                            $array = json_decode($eljson, true);
                            $index = 0;
        
                    
                            while($index < sizeof($array))
                            {
                                echo "<option value=".$array[$index]['tid'].">".$array[$index]['tid']."</option>";

                    
                                $index ++;

                                
                            }
                            
                        ?>    

                    </select>
                    
                    
                    <?php
                    echo
                    '<br> <p class="text-warning">';
                    echo                
                     "$errormsgflight </p>";

                     ?>


                </div>
        
                <button type="submit" name="addescala" class="btn btn-info"> Assign </button>
            

        </div>
        <!-- <div class="col-sm-1"> -->
        <!-- </div> -->

        <div class="col-sm-5">
        <h4> Available Airplanes </h4>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getavion";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "ID: ". $array[$index]['tid'] ."<br>";
                        echo "Model: ". $array[$index]['tmodelo'] ."<br>";
                        echo "Capacity: ". $array[$index]['tcapacidad'] ." (sections)<br>";
                        echo "</div>";

                        $index ++;
                    }
                    
            ?>  


            <h4> Available Flight Stops </h4>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getescala";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        //echo "Num: ". $array[$index]['Numero'] ."<br>";
                        echo "Flight ID: ". $array[$index]['VueloID'] ."<br>";
                        echo "Plane ID: ". $array[$index]['AvionID'] ."<br>";
                        echo "Departure/Arrival: ". $array[$index]['ASalida'] ."/".$array[$index]['ALlegada'] ."<br>";
                        //echo "Arrival: ". $array[$index]['ALlegada'] ."<br>";
                        //echo "Miles: ". $array[$index]['Millas'] ."<br>";
                        echo "Departure Date: ". $array[$index]['FSalida'] ."<br>";
                        echo "Arrival Date: ". $array[$index]['FLlegada'] ."<br>";

                        
                        echo "</div>";

                        $index ++;
                    }
                    
            ?> 

        </div>    
                   
        <div class="col-sm-3">
            <h4> Available Flights </h4>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getvuelo";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "Flight ID: ". $array[$index]['tid'] ."<br>";
                        echo "Cost: ". $array[$index]['tprecio'] ."$<br>";
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



<br><br><br><br><br>
</div>










