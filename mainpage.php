
<?php require 'header.php' ;

if (!(isset($_SESSION["userID"])))
    {
        header("Location: login.php");
        
    }






?>


    
<body>

<?php 


    if($_SESSION['dept'] == '4')
    {
        

        require 'adminpage.php';

    }
    elseif($_SESSION['dept'] == '3')
    {
        

        require 'receppage.php';

    }
    elseif($_SESSION['dept'] == '2')
    {
        

        require 'scannerpage.php';

    }
    elseif($_SESSION['dept'] == '1')
    {
        

        require 'shipperpage.php';

    }
?>







</body>

</html>