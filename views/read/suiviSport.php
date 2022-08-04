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

$sportController = new SportController;
$sports = $sportController->getAll();
$sportController = new SportController();
//echo "<pre>";
//var_dump($sports);
//echo"</pre>";
?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Suivi des sports enregistrés</h4>
        
            <div class="container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Sport enregistrés</th>
      <th scope="col">Modifier</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($sports as $sport) : 
        $sport = $sportController->get($sport->getId());?>
    <tr>
      
      <td><?= $sport->getName() ?></td>
      <td> <a href="" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
        <i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="../delete/suppressionSport.php?id=<?= $sport->getId() ?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
        <i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
  
    <?php
        endforeach
        ?>
  </tbody>
</table>
</div>
        </section>