<?php
session_start();
require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';


function loadClass(string $class)
{
    if ($class === "DotEnv") {
        require_once "../../config/$class.php";
    } else if (str_contains($class, "Controller")) {
        require_once "../../controllers/$class.php";
    } else {
        require_once "../../models/$class.php";
    }
}

spl_autoload_register("loadClass");

$enregistrementSportController = new EnregistrementSportController;
$enregistrements = $enregistrementSportController->getAll();
$anneeController = new AnneeController();

$sportController = new SportController();
$monthController = new MonthController();




?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Suivi des enregistrement quotidient</h4>
        
            <div class="container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Année</th>
      <th scope="col">Mois</th>
      <th scope="col">Jour</th>
      <th scope="col">Sport</th>
      <th scope="col">Durée</th>
      <th scope="col">km</th>
      <th scope="col">Modifier</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($enregistrements as $enregistrement) : 
        $annee = $anneeController->get($enregistrement->getAnnee_id());
        $sport = $sportController->get($enregistrement->getSport_Id());
        $releaseDate = new DateTime($enregistrement->getJour());
        $mois = $monthController->get($enregistrement->getMonth_id());

        ?>
    <tr>
      
      
      <td><?= $annee->getAnnee_date() ?></td>
      <td><?= $mois->getName() ?></td>
      <td><?= $releaseDate->format('d') ?></td>
      <td><?= $sport->getName() ?></td>
      <td><?= $enregistrement->getDuree() ?></td>
      <td><?= $enregistrement->getKm() ?></td>
      <td><a href="../update/modificationEnregistrementSport.php?id=<?= $enregistrement->getId() ?>"  class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
        <i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="../delete/suppressionEnregistrementSport.php?id=<?= $enregistrement->getId() ?>"  class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
        <i class="fa-solid fa-trash-can"></i></a></td>
    
    </tr>
  
    <?php
        endforeach
        ?>
  </tbody>
</table>
</div>
        </section>