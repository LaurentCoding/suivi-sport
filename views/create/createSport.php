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
if($_POST){
    $sportController = new SportController;
    $newSport = new Sport($_POST);
    $sportController->create($newSport);
    echo "<script>window.location='../accueil.php'</script>";
}
?>

<section class="container d-flex flex-column justify-content-center">
<h3>Créer un sport</h3>
    <form class="container-fluid w-50"  method="POST">
        <label for="name">Sport</label>
        <input type="text" name="name" id="name" placeholder="Sport de référence" class="form-control">
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3">
    </form>
</section>


<?php
require_once '../commun/footer.php';
?>