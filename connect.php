<?php

$serverName = 'localhost';
$connectionInfo = array("Database"=>"PRUEBA", "UID"=>"user", "PWD"=>"pass", "CharacterSet"=>"UTF-8");


$conn_sis = sqlsrv_connect($serverName, $connectionInfo);


if($conn_sis)
{
    //echo "conexion exitosa <br>";
}
else{
    //echo "fallo en conexion <br>";
    die( print_r(sqlsrv_errors(), true));
}






function insertSQL(){

    $resultado = "INSERT INTO Cliente (Nombre, Correo) VALUES ('Chanc434hus', 'chanchus@gmail.com')";

    $r = sqlsrv_prepare($conn_sis, $resultado);

    if(sqlsrv_execute($r))
    {
        //echo "se mando el query <br>";
    }
    else { 
       // echo "estas mamando el query <br>"; 
    }



}

function selectSQL(){

    $resultado = "SELECT * FROM Cliente ";

    $stmt = sqlsrv_query( $conn_sis, $resultado );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo $row['Nombre'].", ".$row['Correo']."<br />";
    }

    sqlsrv_free_stmt( $stmt);

}




?>