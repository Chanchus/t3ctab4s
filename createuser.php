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


    
<body>



<?php require 'navbar.php'; ?>

<div style="height:10px"> </div>



<div class="container">
    
    <div class="row">
    
    <div class="col-sm-1"> </div>
    <div class="col-sm-10">
        <h1> Create User </h1>
        <br><br>
        <form action="mainpage.php">
        <div class="form-group">
            <label><h4> First Name</h4> </label>
            <input type="text" class="form-control" placeholder="Enter First Name">
        </div>

        <div class="form-group">
            <label><h4> Last Name</h4> </label>
            <input type="text" class="form-control" placeholder="Enter Last Name">
        </div>

        <div class="form-group">
            <label><h4> SSN</h4> </label>
            <input type="text" class="form-control" placeholder="Enter Ssn">
        </div>

        <div class="form-group">
            <label><h4> Email</h4> </label>
            <input type="text" class="form-control" placeholder="Add Email">
        </div>
        
        <div class="form-group">
            <label><h4>Line of Work</h4>
            <select class="form-control">
                <option value="administrator">Administrator</option>
                <option value="shipper">Shipper</option>
                <option value="scanner">Scanner</option>
                <option value="receptionist">Receptionist</option>
            </select>
        </div>
    

        <button type="submit" class="btn btn-success"> Create new user </button>
    </div>
    
    </form>
    </div>
</div>





</body>

</html>