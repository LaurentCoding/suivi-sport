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
$anneeController = new AnneeController();
$annees = $anneeController->getAll();
$walkController = new WalkController();
$monthController = new MonthController();
$mois = $monthController->getAll();

$walk = $walkController->get($_GET["id"]);
//print_r($walk);

if($_POST){
    
    $walk->hydrate($_POST);
    $walkController->update($walk);
    echo "<script>window.location='../accueil.php'</script>";
}

?>

<section class="container d-flex flex-column justify-content-center pas">
        <h4>Modifier l'enregistrement</h4>
        <form method="post" class="w-50 mx-auto">              
                <label for="pas">Pas</label>
                <input type="int" class="form-control" name="pas" id="pas" value="<?= $walk->getPas() ?>" placeholder="Nombre de pas" required>
                <label for="date_walk">Date</label>
                <input type="date" name="date_walk" id="date_walk" value="<?= $walk->getDate_walk() ?>"class="form-control">

                <label for="month_id">Mois</label>
        <select name="month_id" id="month_id" class="form-select">
        <option value="" selected>-- Sélectionnez un mois --</option> 
        <?php
                foreach ($mois as $month) : ?>
                    <option <?= $month->getId() === $walk->getMonth_id() ? "selected" : "" ?> value="<?= $month->getId() ?>"><?= $month->getName() ?></option>
                <?php endforeach ?>
        </select> 

                <label for="annee_id">Année</label>
        <select name="annee_id" id="annee_id" class="form-select">
        <option value="" selected>-- Sélectionnez une année --</option> 
        <?php
                foreach ($annees as $annee) : ?>
                    <option <?= $annee->getId() === $walk->getAnnee_id() ? "selected" : "" ?> value="<?= $annee->getId() ?>"><?= $annee->getAnnee_date() ?></option>
                <?php endforeach ?>
        </select> 
                <input type="submit" class="btn btn-primary my-3" value="Valider">
            </form>
        </section>