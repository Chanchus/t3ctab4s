


<?php require 'header.php';
    
    if (isset($_SESSION["userName"]))
    {
        header("Location: mainpage.php");
    }

    //CHECK FOR ERRORS IN LOGIN
    $errormsg = "";

    if (isset($_GET['error']))
    {
        if ($_GET['error']=="emptyfields")
        {
            $errormsg = "There are empty fields!";
        }
        elseif ($_GET['error']=="nouser")
        {
            $errormsg = "Invalid ID or password!";
        }
        elseif ($_GET['error']=="invalidID")
        {
            $errormsg = "Thats an invalid ID!";
        }
    }


    //NAV BAR
    echo '
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="login.php"><h4>TEC Airlines Baggage Administration System</h4></a>
        
        
    </div>
    </nav>';



    // LOGIN FORM
    echo
    '<body>
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img"><img src="img/airport.png"></div>

                    <form class="col-12" action="login-ver.php" method="post">
                        <div class="form-group" id="emailinput">
                            <input type="text" name="userId" class="form-control" placeholder="User ID">
                        </div>
                        <div class="form-group" id="emailinput">
                            <input type="password" name="pwd" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" name="login-submit" class="btn btn-success btn-lg"><i class="fas fa-sign-in-alt"></i> Login</button>
                    </form>';

    echo
                    '<p class="text-warning">';
    echo                
                     "$errormsg </p>
                </div>  <!-- End of Modal Content-->
            </div>
        </div> 
    

    </body>
    
</html>";









?>

  


