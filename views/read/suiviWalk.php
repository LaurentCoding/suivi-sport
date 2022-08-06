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

$walkController = new WalkController;
$walks = $walkController->getAll();
$anneeController = new AnneeController();
$monthController = new MonthController();

//var_dump($walks);

?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Suivi des pas</h4>
        
            <div class="container">
<table class="table table-dark table-hover">
  <thead>
    <tr>
      
      <th scope="col">Pas</th>
      <th scope="col">Date</th>
      <th scope="col">Mois</th>
      <th scope="col">Année</th>
      <th scope="col">Modifier</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($walks as $walk) : 
        $annee = $anneeController->get($walk->getAnnee_id());
        $releaseDate = new DateTime($walk->getDate_walk());
        $mois = $monthController->get($walk->getMonth_id());
        ?>
    <tr>
      
      <td><?= $walk->getPas() ?> pas</td>
      <td><?=  $releaseDate->format('d')?></td>
      <td><?= $mois->getName() ?></td>
      <td><?= $annee->getAnnee_date() ?></td>
      <td> <a href="../update/modificationWalk.php?id=<?= $walk->getId() ?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
        <i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="../delete/suppressionWalk.php?id=<?= $walk->getId() ?>"  class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
        <i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
  
    <?php
        endforeach
        ?>
  </tbody>
</table>
</div>
        </section>