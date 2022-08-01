<?php

require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';

require_once '../../models/Annee.php';
require_once '../../controllers/AnneeController.php';

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
var_dump($annees);
?>

<section class="container d-flex flex-column justify-content-center">
<h3>Publier une année</h3>
<?php
foreach($annees as $annee) :
   ?>
 
      <h2><?= $annee->getAnnee_Date() ?></h2>
<?php 

endforeach 
?>

  <form class="container-fluid w-50" method="POST">
        <label for="annee">Année</label>
        <input type="number" name="annee" id="annee" placeholder="Année de référence" class="form-control">
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3">
        </form>
</section>


<?php
require_once '../commun/footer.php';
?>