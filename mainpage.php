
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
?>







</body>

</html>