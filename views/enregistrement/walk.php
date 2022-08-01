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

//var_dump($walks);
?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Enregistrer les pas</h4>
            <form method="post" class="w-50 mx-auto">
                <?php 
                foreach ($walks as $walk) :
                ?>
                <label for="pas">Pas</label>
                <input type="int" class="form-control" name="pas" id="pas" placeholder="Nombre de pas" required>
                <label for="release_date">Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control">
                <label for="category_id">Année</label>
        <select name="category_id" id="category_id" class="form-select">
        <option value="" selected>-- Sélectionnez une année --</option> 
        </select>
        <?php
        endforeach
        ?>
                <input type="submit" class="btn btn-primary my-3" value="Valider">
            </form>
        </section>