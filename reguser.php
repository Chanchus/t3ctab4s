<?php

if (isset($_POST['create-submit']))
{
    
    $Fname = $_POST['firstname'];
    $Lname = $_POST['lastname'];
    $SSn = $_POST['ssn'];
    $role = $_POST['workline'];
    $pass = $_POST['pass'];
    $user = $_POST['ssn'];

    



    if(empty($Fname) || empty($Lname) || empty($SSn) || empty($role) || empty($pass) || empty($user))
    {
        header("Location: createuser.php?error=emptyfields");
        exit();
    }
    else{


        $url = "https://tabaswebapi.azurewebsites.net/getempleado/".$SSn;

        $eljson = file_get_contents($url);


        $array = json_decode($eljson, true);
        


        if ($array == null){
            

            $data = array(
                'tced' => $SSn,
                'trol' => $role,
                'tnomb' => $Fname,
                'tape' => $Lname,
                'tuser' => $user,
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
            $result = file_get_contents( 'https://tabaswebapi.azurewebsites.net/createempleado', false, $context );
            $response = json_decode( $result );
            
            header ("Location: mainpage.php");
            exit();
    
        }

        else {

            header("Location: createuser.php?error=useralreadyexists");
            exit();
        }
        



        
    }
    

}



?>