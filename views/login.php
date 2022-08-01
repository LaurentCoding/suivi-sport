<?php
session_start();
require_once './commun/head.php';

function loadClass(string $class)
{
    if ($class === "DotEnv") {
        require_once "../config/$class.php";
    } else if (str_contains($class, "Controller")) {
        require_once "../controllers/$class.php";
    } else {
        require_once "../models/$class.php";
    }
}

spl_autoload_register("loadClass");

$userController = new UserController();

if ($_POST) {
    if ($_POST["username"]) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        echo "<script>window.location='accueil.php'</script>";
    } else {
        echo "<p>Le mot passe ne correspond pas.</p>";
    }
}
?>
    
        <section class="container d-flex flex-column justify-content-center">
        <h4>Connexion</h4>
            <form method="post" class="w-50 mx-auto">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                

                <input type="submit" class="btn btn-primary my-3" value="Se connecter">
            </form>
        </section>

<?php
require_once './commun/footer.php';
?>