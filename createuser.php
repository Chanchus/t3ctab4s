<?php require 'header.php' ;

if (!(isset($_SESSION["userID"])))
    {
        header("Location: login.php");
    }

if ($_SESSION["dept"]!="4")
    {
        header("Location: mainpage.php");
    }   



    $errormsg = "";
    

    if (isset($_GET['error']))
    {
        if ($_GET['error']=="emptyfields")
        {
            $errormsg = "There are empty fields!";
        }
        elseif ($_GET['error']=="useralreadyexists")
        {
            $errormsg = "This User already exists!";
        }
        
        
        
    }


?>


    
<body>






<?php require 'navbar.php'; ?>

<div style="height:10px"> </div>



<div class="container">
    
    <div class="row">
    
    <div class="col-sm-1"> </div>
    <div class="col-sm-10">
        <h1> Create User </h1>
        <br><br>
        <form action="reguser.php" method="post">
        <div class="form-group">
            <label><h4> First Name</h4> </label>
            <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
        </div>

        <div class="form-group">
            <label><h4> Last Name</h4> </label>
            <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
        </div>

        <div class="form-group">
            <label><h4> SSN</h4> <h6>(this will be your username)</h6> </label>
            <input type="text" name="ssn" class="form-control" placeholder="Enter Ssn">
        </div>
        
        <div class="form-group">
            <label><h4> Password</h4> </label>
            <input type="text" name="pass" class="form-control" placeholder="Enter a Password">
        </div>

        
        
        <div class="form-group">
            <label><h4>Line of Work</h4>
            <select class="form-control" name="workline">
                <option value="4">Administrator</option>
                <option value="1">Shipper</option>
                <option value="2">Scanner</option>
                <option value="3">Receptionist</option>
            </select>
        </div>

        <?php 

            echo
            '<br> <p class="text-warning">';
            echo                
            "$errormsg </p>";

        ?>

        <button type="submit" name="create-submit" class="btn btn-success"> Create new user </button>
    </div>
    
    </form>
    </div>
</div>





</body>

</html>