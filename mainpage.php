
<?php require 'header.php' ;

if (!(isset($_SESSION["userName"])))
    {
        header("Location: login.php");
        
    }


?>


    
<body>



<?php require 'navbar.php'; ?>





<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:80px> Overview </h1>
    
    <br><br>

    <div class="row">
        <a href="createuser.php" class="btn btn-info btn-lg" id="menubtn"> New User</a>
        
        <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a>
        
    </div>


    <br>
</div>

<div class="container" style="margin-top:20px;">
    <h1> BagCarts</h1>  <hr style="border-color:#aaaaaa;">
    <div class="row">
        <div class="col-sm-5">
            <h4> Add a new BagCart </h4>
            <form action="mainpage.php">

                <div class="form-group">
                    <label><h6>Cart ID</h6> </label>
                    <input type="text" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label><h6>Model</h6> </label>
                    <input type="text" class="form-control" placeholder="Enter Last Name">
                </div>
                
                <div class="form-group">
                    <label><h6>Brand</h6>
                    <select class="form-control">
                        <option value="aero">AERO</option>
                        <option value="tld">TLD</option>
                        <option value="parkan">Par-Kan</option>
                        <option value="iscar">ISCAR GSE</option>
                        <option value="ersel">Ersel Technology</option>
                        <option value="usimat">Usimat Sermees</option>
                        <option value="viking">Viking Trailers International</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-info"> ADD </button>
            </form>

        </div>
        <div class="col-sm-1">
        </div>

        <div class="col-sm-5">
            <h4> Existing BagCarts </h4>

            <div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">
                ID: aa333jnd <br>
                Model: 2017 <br>
                Brand: AERO <br>
            </div>

            <div class="container" style="background-color:#444444; margin-bottom: 10px; padding: 5px;">
                ID: bbrf443g <br>
                Model: 2018 <br>
                Brand: ISCAR GSE <br>
            </div>
        </div>
    </div>

    

</div>







<div class="container">
<div class="jumbotron text-center">
    <!-- <div class="container"> -->
        <h1> welcome to my haus</h1>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        </p>
        <a href="#" class="btn btn-primary"> read more</a>
    <!-- </div> -->
    </div>
</div> 






</body>

</html>