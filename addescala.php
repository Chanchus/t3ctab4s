<?php

if (isset($_POST['addescala']))
{
    
    
    $Ddate = $_POST['departuredate'];
    $Adate = $_POST['arrivaldate'];
    $DepA = $_POST['departure'];
    $ArrA = $_POST['arrival'];
    $AirID = $_POST['planeid'];
    $FlightID = $_POST['flightid'];
    $miles = 100;
    

    


    if(empty($Ddate) || empty($Adate) || $DepA=="" || $ArrA=="" || $AirID=="" || $FlightID=="")
    {
        header("Location: mainpage.php?error=emptyfieldsflight");
        exit();
    }

    else{



        

        $array = null;


        if ($array== null){
            
            $data = array(
                'Fsalida' => $Ddate,
                'FLlegada' => $Adate,
                'VueloID' => $FlightID,
                'AvionID' => $AirID,
                'VueloID' => $capacity,
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