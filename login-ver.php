<?php

require 'connect.php';

if (isset($_POST['login-submit']))
{

    
    
    $userID = $_POST['userId'];
    $password = $_POST['pwd'];


    if(empty($userID) || empty($password))
    {
        header("Location: login.php?error=emptyfields");
        exit();
    }
    /*else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        
        header("Location: login.php?error=invalidmail");
        echo "<b> INVALID EMAIL </b>";
        exit();
    }*/

    else
    {
        /*$result = "SELECT * FROM Employee WHERE Email="."'".$email."' AND Password="."'".$password."'" ;

        $cliente;
        $stmt = sqlsrv_query( $conn_sis, $result );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }

        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC); 
        //echo $row['Nombre'].", ".$row['Correo']."<br />";
        if ($row == NULL)
        {
            header("Location: login.php?error=nouser");
            exit();
        }
        else
        {

            session_start();
            $_SESSION["userID"] = $row['tced']; 
            $_SESSION["dept"] = $row['trol']; 

            header("Location: mainpage.php");
        }
        
        

        sqlsrv_free_stmt( $stmt); 
        */

        $url = "https://tabaswebapi.azurewebsites.net/getempleado/".$userID;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);
        

        if($array != NULL)
        {
            session_start();
            $_SESSION["userID"] = $array['tced']; 
            $_SESSION["dept"] = $array['trol']; 

            header("Location: mainpage.php");
        }
        else{
            header("Location: login.php?error=nouser");
            exit();
        }
        
        


    }
}
else{
    header("Location: login.php");
}