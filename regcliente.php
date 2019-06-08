<?php

if (isset($_POST['client-submit']))
{
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $passport = $_POST['passport'];
    $password = $_POST['password'];
    $college = $_POST['college'];
    $studid = $_POST['studid'];
    $cardnum = $_POST['card'];
    



    if(empty($name) || empty($phone) || empty($email) || empty($passport) || empty($password))
    {
        header("Location: createclient.php?error=emptyfields");
        exit();
    }
    else{


        $url = "https://tabaswebapi.azurewebsites.net/getpasajero/".$passport;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);
        


        if ($array == null){
            

            $data = array(
                'tpasaporte' => $passport,
                'tcarne' => $studid,
                'tnomb' => $name,
                'ttelfono' => $phone,
                'tcorreo' => $email,
                'tntarjeta' => $cardnum,
                'tpass' => $pass
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
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createpasajero', false, $context );
            $response = json_decode( $result );
            
            header ("Location: mainpage.php");
            exit();
    
        }

        else {

            header("Location: createclient.php?error=useralreadyexists");
            exit();
        }
        



        
    }
    

}



?>