<?php

require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';

//require_once '../../models/Annee.php';
//require_once '../../controllers/AnneeController.php';

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
if($_POST){
    $anneeController = new AnneeController;
    $newAnnee = new Annee($_POST);
    $anneeController->create($newAnnee);
    echo "<script>window.location='../accueil.php'</script>";
}

?>

<section class="container d-flex flex-column justify-content-center">
<h3>Créer une année</h3>
    <form class="container-fluid w-50" method="POST">
        <label for="annee_date">Année</label>
        <input type="number" name="annee_date" id="annee_date" placeholder="Année de référence" class="form-control">
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3">
    </form>
</section>


<?php
require_once '../commun/footer.php';
?>