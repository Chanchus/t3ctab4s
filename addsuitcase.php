<?php

if (isset($_POST['lug-submit']))
{
    
    $num = $_POST['lug-code'];
    //$cartid = $_POST[''];
    $cost = $_POST['lug-cost'];
    //$check = $_POST[''];
    $owner = $_POST['lug-owner'];
    $weight = $_POST['lug-weight'];
    

    


    if(empty($num) || empty($cost) || empty($owner) || empty($weight))
    {
        header("Location: mainpage.php?error=emptyfieldslug");
        exit();
    }
    else{


        $url = "https://tabaswebapi.azurewebsites.net/getmaleta/".$num;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);
        


        if ($array == null){
            

            

            $data = array(
                'tnumero' => $num,
                //'tbagcartid' => $brand,
                'tcosto' => $cost,
                //'trevisado' => $model,
                'tpeso' => $weight,
                'tpasajeroid' => $owner

                
              );
        
             
            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => json_encode( $data ),
                    'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
                )
            );
        
            $context  = stream_context_create( $options );
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createbagcart', false, $context );
            $response = json_decode( $result );
            
            header ("Location: mainpage.php");
            exit();
    
        }

        else {

            header("Location: mainpage.php?error=lugalreadyexists");
            exit();
        }
        



        
    }
    

}

?>