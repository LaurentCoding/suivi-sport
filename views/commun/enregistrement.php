<?php
session_start();
require_once './head.php';
require_once './navEnregistrement.php';
?>
<section class="accueil container mt-5">

  <div class="d-flex">
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Ajout pas</h5>
        <a href="../create/createWalk.php" class="btn btn-primary my-5" role="button">Mes pas</a>
      </div>
    </div>
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Ajout journalier</h5>
        <a href="../create/createEnregistrementSport.php" class="btn btn-primary my-5" role="button">Enregistrement quotidient</a>
      </div>
    </div>
  
  </div>
  <div class="d-flex mt-5">
    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Ajouter des sports</h5>
        <a href="../create/createSport.php" class="btn btn-primary my-5" role="button">Sport</a>
      </div>
    </div>

    <div class="card w-50 m-5">
      <div class="card-body text-center">
        <h5 class="card-title">Ajouter des années</h5>
        <a href="../create/createAnnee.php" class="btn btn-primary my-5" role="button">Les années</a>
      </div>
    </div>
  </div>

</section>
<?php
require_once './footer.php';
?>