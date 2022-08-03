<?php
session_start();
require_once './commun/head.php';
require_once './commun/nav.php';
?>
<h1>
  <?= $_SESSION && $_SESSION['username'] ? "<span>Bienvenue {$_SESSION["username"]}</span>" : ""; ?>
</h1>
<section class="container d-flex p-2">
<div class="card w-50 m-2" >
  <img src="../images/images2.jpg" class="card-img-top w-50" alt="marcheur regardans un lac">
  <div class="card-body">
    <h5 class="card-title">Enregistrement de suivis</h5>
    <p class="card-text">Permet d'enregistrer ses occupations quotidienne</p>
    <a href="./commun/enregistrement.php" class="btn btn-primary">Cliquez ici</a>
  </div>
</div>
<div class="card w-50 m-2" >
  <img src="../images/images.jpg" class="card-img-top w-50" alt="marcheur regardans un lac">
  <div class="card-body">
    <h5 class="card-title">Suivi quotidient</h5>
    <p class="card-text">Permet de suivre les efforts</p>
    <a href="./commun/suivi.php" class="btn btn-primary">Cliquez ici</a>
  </div>
</div>

  
</section>


<?php
require_once './commun/footer.php';
?>