<?php include_once 'config/init.php'; ?>



<?php

    $database = new Database;

    $template = new Template('templates/frontpage.php');
    

    $template->title = 'Latest Jobs';
    $template->databases = $database->selectSQL();

    echo $template;





?>