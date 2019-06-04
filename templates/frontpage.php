<?php include '../inc/header.php'; ?>



<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Hello, world!</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    
    <?php 
        $database = new Database();
        $selectArray = $database->selectSQL(); 
        foreach($selectArray as $cliente): ?>
    <div class="row">
      <div class="col-md-10">
        <h3>Cliente</h3>
        <p> <?php echo "Nombre: " .$cliente->Name. "<br> Correo: " .$cliente->Correo. "<br>"; ?></p> 
        <p><a class="btn btn-secondary" href="#" role="button">View &raquo;</a></p>
      </div>
    </div>

    <?php endforeach;  ?>
    <hr>

  </div> <!-- /container -->

</main>


<?php include '../inc/footer.php'; ?>