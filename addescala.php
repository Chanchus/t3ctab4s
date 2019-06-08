<?php

if (isset($_POST['add-escala']))
{
    
    
    $Ddate = $_POST['departuredate'];
    $Adate = $_POST['arrivaldate'];
    $DepA = $_POST['departure'];
    $ArrA = $_POST['arrival'];
    $AirID = $_POST['planeid'];
    $FlightID = $_POST['flightid'];
    $miles = 100;
    $num = $_POST['numero'];

    


    if(empty($Ddate) || empty($Adate))
    {
        header("Location: mainpage.php?error=emptyfieldsflight");
        exit();
    }

    else{

        

        

        


        if (true){
            
            $data = array(
                'Numero' => $num,
                'Fsalida' => $Ddate,
                'FLlegada' => $Adate,
                'VueloID' => $FlightID,
                'AvionID' => $AirID,
                'ASalida' => $DepA,
                'ALlegada' => $ArrA,
                'Millas' => $miles
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
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createescala', false, $context );
            $response = json_decode( $result );

            header ("Location: mainpage.php");
            exit();
        }
        

        else {

            header("Location: mainpage.php");
            exit();
        }



    }

    


}

?>