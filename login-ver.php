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
    

    else
    {
        

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