

<?php
    

    $errormsglug = "";
    

    if (isset($_GET['error']))
    {
        if ($_GET['error']=="emptyfieldslug")
        {
            $errormsglug = "There are empty fields!";
        }
        elseif ($_GET['error']=="lugalreadyexists")
        {
            $errormsglug = "That code is already in use!";
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
        
        <!-- <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a> -->
        
    </div>


    <br>
</div>



<div class="container" style="margin-top:20px;" id="add-form">
    <h1> Luggage</h1>  <hr style="border-color:#aaaaaa;">
    <div class="row">
        <div class="col-sm-5">
            <h4> Add a new SuitCase </h4>
            <form action="addsuitcase.php" method="post">

                <div class="form-group">
                    <label><h6>Owner's ID</h6> </label>
                    <input type="text" name="lug-owner"  class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label><h6>Color</h6> </label>
                    <input type="text" name="lug-color"  class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label><h6>weight</h6> </label>
                    <input type="text" name="lug-weight"  class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label><h6>Cost</h6> </label>
                    <input type="text" name="lug-cost"  class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label><h6>Suitcase Code</h6> </label>
                    <input type="text" name="lug-code"  class="form-control" placeholder="">
                </div>
                
                
                <?php
                    echo
                    '<br> <p class="text-warning">';
                    echo                
                     "$errormsglug </p>";

                     ?>
        
                <button type="submit" name="lug-submit" class="btn btn-info"> Add Suitcase </button>
            


        </div>
        <div class="col-sm-1">
        </div>

        <div class="col-sm-5">
            <h4> Existing Luggage </h4>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getmaleta";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "num: ". $array[$index]['tnumero'] ."<br>";
                        echo "Owner: ". $array[$index]['tpasajeroid'] ."<br>";
                        echo "BagCart: ". $array[$index]['tbagcartid'] ."<br>";
                        echo "Cost: ". $array[$index]['tcosto'] ."<br>";
                        echo "Status: ". $array[$index]['trevisado'] ."<br>";
                        echo "weight: ". $array[$index]['tpeso'] ."<br>";

                        echo "</div>";

                        $index ++;
                    }
                    
            ?>        
                
                
            

            

        </div>
    </div>

    

</div>
