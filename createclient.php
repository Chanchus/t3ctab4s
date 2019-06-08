<?php require 'header.php' ;

if (!(isset($_SESSION["userID"])))
    {
        header("Location: login.php");
    }

if ($_SESSION["dept"]!="3")
    {
        header("Location: mainpage.php");
    }   

?>
<head>

<script type="text/javascript">


$(document).ready(function(){
$('#checkbox').change(function(){
if(this.checked){
    $('#field1').fadeIn();
    
}
else{
    $('#field1').fadeOut();
    
}
});
});

</script>
<script type="text/javascript">


$(document).ready(function(){
$('#checkbox').change(function(){
if(this.checked){
    $('#field2').fadeIn();
    
}
else{
    $('#field2').fadeOut();
    
}
});
});

</script>

</head>


<?php

$errormsg = "";
    

if (isset($_GET['error']))
{
    if ($_GET['error']=="emptyfields")
    {
        $errormsg = "There are empty fields!";
    }
    elseif ($_GET['error']=="useralreadyexists")
    {
        $errormsg = "This Client already exists!";
    }
    
    
    
}

?>



<body>



<?php require 'navbar.php';
?>


<div class="container">
    
    <div class="row">
    
    <div class="col-sm-1"> </div>
    <div class="col-sm-10">
        <h1> Create a new Client </h1>
        <br><br>
        <form action="regcliente.php" method="post">
        <div class="form-group">
            <label><h4> Full Name</h4> </label>
            <input type="text" name="name" class="form-control" placeholder="Enter a Name">
        </div>

        <div class="form-group">
            <label><h4> Phone Number</h4> </label>
            <input type="text" name="phone" class="form-control" placeholder="Enter a Phone Number">
        </div>

        <div class="form-group">
            <label><h4> Email</h4> </label>
            <input type="text" name="email" class="form-control" placeholder="Enter an Email">
        </div>
        
        <div class="form-group">
            <label><h4> Passport</h4> </label>
            <input type="text" name="passport" class="form-control" placeholder="Enter an Passport number">
        </div>

        <div class="form-group">
            <label><h4> Password</h4> </label>
            <input type="text" name="password" class="form-control" placeholder="Enter a Password">
        </div>

        <div class="form-group">
            <label><h4> Card Number</h4> </label>
            <input type="text" name="card" class="form-control" placeholder="Enter a Card Number">
        </div>
        

        <fieldset class="form-group">
            <legend></legend>
            <div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="" id="checkbox">
                Student
                </label>
            </div>
        </fieldset>

        <div class="form-group" id="field1" style="display:none;">
            <label><h4> College Name</h4> </label>
            <input type="text" name="college" class="form-control" placeholder="Enter an Email">
        </div>
        <div class="form-group" id="field2" style="display:none;">
            <label><h4> Student ID</h4> </label>
            <input type="text" name="studid" class="form-control" placeholder="Enter an Email">
        </div>

        <?php 

            echo
            '<br> <p class="text-warning">';
            echo                
            "$errormsg </p>";

        ?>

        <button type="submit" name="client-submit" class="btn btn-success"> Create new user </button>
    </div>
    
    </form>
    </div>
</div>





</body>

</html>