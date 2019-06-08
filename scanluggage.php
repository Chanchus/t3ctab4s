<?php


    $status = $_GET['status'];
    $num = $_GET['number'];


    echo $status;
    echo$num;


   
    
    $data = array(
        'tnumero' => $num,
        'trevisado' => $status   
    );
     
    $options = array(
        'http' => array(
            'method'  => 'PUT',
            'content' => json_encode( $data ),
            'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/modifymaleta/'.$num , false, $context );
    $response = json_decode( $result );
    
    //header ("Location: mainpage.php");
    exit();







?>