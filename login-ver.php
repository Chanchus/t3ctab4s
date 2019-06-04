<?php

require 'connect.php';

if (isset($_POST['login-submit']))
{

    
    
    $email = $_POST['emailId'];
    $password = $_POST['pwd'];


    if(empty($email) || empty($password))
    {
        header("Location: login.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        
        header("Location: login.php?error=invalidmail");
        echo "<b> INVALID EMAIL </b>";
        exit();
    }

    else
    {
        $result = "SELECT * FROM Employee WHERE Email="."'".$email."' AND Password="."'".$password."'" ;

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
            $_SESSION["userName"] = $row['Name']; 
            $_SESSION["dept"] = $row['Department']; 

            header("Location: mainpage.php");
        }
        
        

        sqlsrv_free_stmt( $stmt); 



    }
}
else{
    header("Location: login.php");
}
