<?php
session_start();
require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';

require_once '../../models/Walk.php';
require_once '../../controllers/WalkController.php';

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
//var_dump($walks);
?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Suivi des pas</h4>
        
            <div class="container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Pas</th>
      <th scope="col">Date</th>
      <th scope="col">Année</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($walks as $walk) : 
        $annee = $anneeController->get($walk->getAnnee_id());?>
    <tr>
      
      <td><?= $walk->getPas() ?> pas</td>
      <td><?= $walk->getDate_walk() ?></td>
      <td><?= $annee->getAnnee_date() ?></td>
    </tr>
  
    <?php
        endforeach
        ?>
  </tbody>
</table>
</div>
        </section>