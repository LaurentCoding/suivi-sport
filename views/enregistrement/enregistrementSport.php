<?php
session_start();
require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';

require_once '../../models/EnregistrementSport.php';
require_once '../../controllers/EnregistrementSportController.php';

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


?>

<section class="container d-flex flex-column justify-content-center">
<h3>Publier une journée</h3>
        <form class="container-fluid w-50" method="POST">
        <label for="">Jour</label>
        <input type="number" name="title" id="title" placeholder="Jour" class="form-control">
        <label for="title">km</label>
        <input type="number" name="director" id="director" placeholder="Nombre de KM" class="form-control">
        <label for="title">Durée</label>
        <input type="number" name="director" id="director" placeholder="Temps de la sortie" class="form-control">
        <label for="category_id">Année</label>
        <select name="category_id" id="category_id" class="form-select">
        <option value="" selected>-- Sélectionnez une année --</option> 
        </select>
        <label for="category_id">Sport</label>
        <select name="category_id" id="category_id" class="form-select">
                <option value="" selected>-- Sélectionnez un sport --</option>

        </select>
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3">
        </form>
        </section>


<?php
require_once '../commun/footer.php';
?>