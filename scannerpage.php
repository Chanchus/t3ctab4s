<?php require 'navbar.php'; ?>


<?php

$suitcasenumber ="";



if (isset($_POST['find-lug']))
{
    $suitcasenumber = $_POST['suitcode'];

}

?>



<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js">
</script>

<script>

function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

</script>


<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:60px> Overview | Scanner </h1>
    
    <br><br>

    <!-- <div class="row">
        <a href="createuser.php" class="btn btn-info btn-lg" id="menubtn"> Register User</a>
        
         <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a> 
        
    </div> -->


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
                
        

        
        <form action="mainpage.php" method="post">
        <div class="form-group">
            <label><h4> Suitcase code</h4> </label>
            <input type="text" name="suitcode" class="form-control" placeholder="">
        </div>
        
        <button type="submit" name="find-lug" class="btn btn-primary"> Find Suitcase </button>

        </form>


    

    <br><br><br><br>
</div>



<div class="container" style="margin-top:20px;">
    <br>

    <div class="col-sm-5">
            <h4> Luggage Ready to Scan</h4>
            <br><br>
            <?php 

                    if(isset($_POST['find-lug']))
                    {

                    $url = "https://tabaswebapi.azurewebsites.net/getmaleta/".$suitcasenumber;

                    $eljson = file_get_contents($url);


                    $array = json_decode($eljson, true);
                    $index = 0;
                        
                    
                    if ($array!=null)
                    {
                        while($index < sizeof($array)  )
                        {   
                        if($array[$index]['trevisado'] == "registered")
                        {
                        echo '<div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">';
                        echo "num: ". $array[$index]['tnumero'] ."<br>";
                        echo "Owner: ". $array[$index]['tpasajeroid'] ."<br>";
                        echo "BagCart: ". $array[$index]['tbagcartid'] ."<br>";
                        echo "Cost: ". $array[$index]['tcosto'] ."<br>";
                        echo "Status: ". $array[$index]['trevisado'] ."<br>";
                        echo "weight: ". $array[$index]['tpeso'] ."<br>";
                        echo "<br>";
                        echo '<a href="scanluggage.php?status=accepted&number='.$suitcasenumber. ' class="btn btn-success btn-lg" style="margin-right:10px; id="deliverbtn"> Accepted</a>';
                        echo '<a href="scanluggage.php?status=rejected&number='.$suitcasenumber. ' class="btn btn-danger btn-lg" id="deliverbtn"> Rejected</a>';


                        echo "<br>";
                        echo "</div>";

                        $index ++;
                        }
                        else {
                            $index++;
                        }
                        
                        }    
                    }
                    


                    }
                    
                    
            ?>        
            
            

                
            

            

        </div>  

</div>