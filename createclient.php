<?php require 'header.php' ;

if (!(isset($_SESSION["userName"])))
    {
        header("Location: login.php");
    }

if ($_SESSION["dept"]!="Administrator")
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

<body>



<?php require 'navbar.php'; ?>


<div class="container">
    
    <div class="row">
    
    <div class="col-sm-1"> </div>
    <div class="col-sm-10">
        <h1> Create a new Client </h1>
        <br><br>
        <form action="mainpage.php">
        <div class="form-group">
            <label><h4> Full Name</h4> </label>
            <input type="text" class="form-control" placeholder="Enter a Name">
        </div>

        <div class="form-group">
            <label><h4> Phone Number</h4> </label>
            <input type="text" class="form-control" placeholder="Enter a Phone Number">
        </div>

        <div class="form-group">
            <label><h4> Email</h4> </label>
            <input type="text" class="form-control" placeholder="Enter an Email">
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
            <input type="text" class="form-control" placeholder="Enter an Email">
        </div>
        <div class="form-group" id="field2" style="display:none;">
            <label><h4> Student ID</h4> </label>
            <input type="text" class="form-control" placeholder="Enter an Email">
        </div>

        

        <button type="submit" class="btn btn-success"> Create new user </button>
    </div>
    
    </form>
    </div>
</div>





</body>

</html>