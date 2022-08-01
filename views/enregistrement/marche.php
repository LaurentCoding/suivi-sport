<?php
session_start();
require_once '../commun/head.php';
require_once '../commun/navEnregistrement.php';
?>
<section class="container d-flex flex-column justify-content-center">
        <h4>Enregistrer les km de marche</h4>
            <form method="post" class="w-50 mx-auto">
                <label for="release_date">Date</label>
                <input type="date" class="form-control" name="release_date" id="release_date" placeholder="Date" required>
                <label for="time">Durée</label>
                <input type="time" class="form-control" name="time" id="time" placeholder="Durée" required>
                <label for="distance">Distance</label>
                <input type="number" class="form-control" name="distance" id="distance" placeholder="Distance" required>
                <input type="submit" class="btn btn-primary my-3" value="Valider">
            </form>
        </section>

<?php
  require_once '../commun/footer.php';
?>