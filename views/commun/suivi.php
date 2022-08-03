<?php
session_start();
require_once './head.php';
require_once './navEnregistrement.php';
?>
<section class="accueil container">

  <div class="d-flex">
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Suivi des pas</h5>
        <a href="../read/suiviWalk.php" class="btn btn-primary my-5" role="button">Mes pas</a>
      </div>
    </div>
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Suivi quotidient</h5>
        <a href="../read/suiviEnregistrementSport.php" class="btn btn-primary my-5" role="button">Enregistrement quotidient</a>
      </div>
    </div>
  

  </div>
  <div class="d-flex">
  <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Suivi des sports</h5>
        <a href="../read/suiviSport.php" class="btn btn-primary my-5" role="button">Sport</a>
      </div>
    </div>
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Suivi des années</h5>
        <a href="../read/suiviAnnee.php" class="btn btn-primary my-5" role="button">Les années</a>

      </div>
    </div>

  </div>

</section>