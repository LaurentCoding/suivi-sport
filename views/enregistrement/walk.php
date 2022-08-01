<?php
session_start();
require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';
?>

<section class="container d-flex flex-column justify-content-center">
        <h4>Enregistrer les pas</h4>
            <form method="post" class="w-50 mx-auto">
                <label for="pas">Nombre de pas</label>
                <input type="int" class="form-control" name="pas" id="pas" placeholder="Nombre de pas" required>
                <label for="release_date">Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control">
                <input type="submit" class="btn btn-primary my-3" value="Valider">
            </form>
        </section>