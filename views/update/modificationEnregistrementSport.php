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
//var_dump($anneeController);
$annees = $anneeController->getAll();
$sportController = new SportController();
$sports = $sportController->getAll();
$monthController = new MonthController();
$mois = $monthController->getAll();
$enregistrementController = new EnregistrementSportController;

$enregistrementSport = $enregistrementController->get($_GET["id"]);


if($_POST){
        $enregistrementSport->hydrate($_POST);
        $enregistrementController->update($enregistrementSport);
        echo "<script>window.location='../accueil.php'</script>";
}
?>

<section class="container d-flex flex-column justify-content-center">
<h3>Modifier une journée</h3>
        <form class="container-fluid w-50" method="POST">
        <label for="jour">Jour</label>
        <input type="date" name="jour" id="jour" value="<?= $enregistrementSport->getJour() ?>" placeholder="Jour" class="form-control">
        <label for="km">km</label>
        <input type="text" name="km" id="km" value="<?= $enregistrementSport->getKm() ?>" placeholder="Nombre de KM" class="form-control">
        <label for="duree">Durée</label>
        <input type="text" name="duree" id="duree" value="<?= $enregistrementSport->getDuree() ?>" placeholder="Temps de la sortie" class="form-control">
        <label for="month_id">Mois</label>
        <select name="month_id" id="month_id" class="form-select">
        <option value="" selected>-- Sélectionnez un mois --</option> 
        <?php
                foreach ($mois as $month) : ?>
                <option <?= $month->getId() === $enregistrementSport->getMonth_id() ? "selected" : "" ?> value="<?= $month->getId() ?>"><?= $month->getName() ?></option>
                <?php endforeach ?>
        </select> 
        <label for="annee_id">Année</label>
        <select name="annee_id" id="annee_id" class="form-select">
                <option value="" selected>-- Sélectionnez une année --</option> 
                <?php
                foreach ($annees as $annee) : ?>
                <option <?= $annee->getId() === $enregistrementSport->getAnnee_id() ? "selected" : "" ?> value="<?= $annee->getId() ?>"><?= $annee->getAnnee_date() ?></option>
                <?php endforeach ?>
        </select>
        <label for="sport_id">Sport</label>
        <select name="sport_id" id="sport_id" class="form-select">
                <option value="" selected>-- Sélectionnez un sport --</option>
                <?php
                foreach ($sports as $sport) : ?>
                <option <?= $sport->getId() === $enregistrementSport->getSport_id() ? "selected" : "" ?> value="<?= $sport->getId() ?>"><?= $sport->getName() ?></option>
                <?php endforeach ?>
        </select>
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3">
        </form>
        </section>


<?php
require_once '../commun/footer.php';
?>