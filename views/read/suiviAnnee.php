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

$anneeController = new AnneeController;
$annees = $anneeController->getAll();
$anneeController = new AnneeController();
//var_dump($walks);
?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Suivi des années</h4>
        
            <div class="container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Années enregistrés en base de donnée</th>
      <th scope="col">Modifier</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($annees as $annee) : 
        $annee = $anneeController->get($annee->getId());?>
    <tr>
      
      <td><?= $annee->getAnnee_date() ?></td>
      <td> <a href="" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
        <i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="../delete/suppressionAnnee.php" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
        <i class="fa-solid fa-trash-can"></i></a></td>  
    </tr>
  
    <?php
        endforeach
        ?>
  </tbody>
</table>
</div>
        </section>