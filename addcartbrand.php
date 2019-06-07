<?php

if (isset($_POST['addbrandsubmit']))
{
    
    
    $brand = $_POST['addbrand-brand'];
    $model = $_POST['addbrand-model'];
    $capacity = $_POST['addbrand-capacity'];
    

    


    if(empty($brand) || empty($model) || empty($capacity))
    {
        header("Location: mainpage.php?error=emptyfieldsbrand");
        exit();
    }

    else{



        $url = "https://tabaswebapi.azurewebsites.net/getmarca/".$brand;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);


        if ($array== null){
            
            $data = array(
                'tmarca' => $brand,
                'modelo' => $model,
                'tcapacidad' => $capacity
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
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createmarca', false, $context );
            $response = json_decode( $result );

            header ("Location: mainpage.php");
            exit();
        }
        elseif($array!= null)
        {
            $index = 0;
        
                    
            while($index < sizeof($array))
            {
                if($array[$index]['tmodelo']== $model)
                {
                    header("Location: mainpage.php?error=brandalreadyexists");
                    exit();
                }
                else{
                    $index ++;
                }
   
            }
            $data = array(
                'tmarca' => $brand,
                'tmodelo' => $model,
                'tcapacidad' => $capacity
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
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createmarca', false, $context );
            $response = json_decode( $result );

            header ("Location: mainpage.php");
            exit();

        }

        else {

            header("Location: mainpage.php?error=brandalreadyexists");
            exit();
        }



    }

    


}

?>