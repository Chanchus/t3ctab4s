<?php require 'navbar.php'; ?>



<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js">
</script>

<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:60px> Overview | Shipper </h1>
    
    <br><br>

    <div class="row">
        <a href="createuser.php" class="btn btn-info btn-lg" id="menubtn"> Register User</a>
        
        <!-- <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a> -->
        
    </div>


    <br>
</div>


<div class="container" style="margin-top:20px;">

    <br>
        <h2> QR Code Scanner </h2>
  

        <input type=text class=qrcode-text>
        <label class="btn btn-light">
        <input type=file
                accept="image/*"
                capture=environment
                onchange="openQRCamera(this);"
                tabindex=-1>
        </label>
        

    <br><br><br><br>
</div>


<div class="container" style="margin-top:20px;">
    <br>

    <div class="col-sm-5">
            <h4> Luggage Ready to Deliver</h4>
            <br><br>
            <?php
                    $url = "https://tabaswebapi.azurewebsites.net/getmaleta";

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
 
             
                    while($index < sizeof($array))
                    {   
                        if($array[$index]['trevisado'] == "accepted")
                        {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "num: ". $array[$index]['tnumero'] ."<br>";
                        echo "Owner: ". $array[$index]['tpasajeroid'] ."<br>";
                        echo "BagCart: ". $array[$index]['tbagcartid'] ."<br>";
                        echo "Cost: ". $array[$index]['tcosto'] ."<br>";
                        echo "Status: ". $array[$index]['trevisado'] ."<br>";
                        echo "weight: ". $array[$index]['tpeso'] ."<br>";
                        echo "<br>";
                        echo '<a href="#" class="btn btn-success btn-lg" id="deliverbtn"> Delivered</a>';

                        echo "<br>";
                        echo "</div>";

                        $index ++;
                        }
                        else {
                            $index++;
                        }
                        
                    }
                    
            ?>        
            
            

                
            

            

        </div>  

</div>