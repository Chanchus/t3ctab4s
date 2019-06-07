<?php

if (isset($_POST['addcartsubmit']))
{
    
    $cartID = $_POST['addcart-id'];
    $brand = $_POST['addcart-brand'];
    $model = $_POST['addcart-model'];
    

    


    if(empty($cartID) || empty($model))
    {
        header("Location: mainpage.php?error=emptyfieldscart");
        exit();
    }
    else{


        $url = "https://tabaswebapi.azurewebsites.net/getbagcart/".$cartID;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);
        


        if ($array == null){
            

            $url = "https://tabaswebapi.azurewebsites.net/getmarca/".$brand;

            $eljson = file_get_contents($url);


            $array = json_decode($eljson, true);

            $index = 0;
        
                    
            while($index < sizeof($array))
            {
                if($array[$index]['tmodelo']== $model)
                {
                    $index ++;
                }
                else{
                    
                    header("Location: mainpage.php?error=branddoesntexists");
                    exit();
                }
   
            }

            $data = array(
                'tid' => $cartID,
                'tmarca' => $brand,
                'tmodelo' => $model
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

            header("Location: mainpage.php?error=cartalreadyexists");
            exit();
        }
        



        
    }
    

}

?>