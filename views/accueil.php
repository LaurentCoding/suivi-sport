<?php
session_start();
require_once './commun/head.php';
require_once './commun/nav.php';
?>
<div class="accueil mt-5 mb-5">
<h1>
  <?= $_SESSION && $_SESSION['username'] ? "<span>Bienvenue {$_SESSION["username"]}</span>" : ""; ?>
</h1>
</div>

<section class=" container d-flex p-2">
<div class="card w-50 m-2" >
  <div class="mt-5">
  <img src="../images/images2.jpg" class="rounded-circle" alt="marcheur regardans un lac">
  </div>
  <div class="card-body">
    <h5 class="card-title">Enregistrement de suivis</h5>
    <p class="card-text">Permet d'enregistrer les efforts quotidient</p>
    <a href="./commun/enregistrement.php" class="btn btn-primary">Cliquez ici</a>
  </div>
</div>
<div class="card w-50 m-2" >
  <div class="mt-5">
  <img src="../images/images.jpg" class="rounded-circle" alt="marcheur regardans un paysage">
  </div>
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