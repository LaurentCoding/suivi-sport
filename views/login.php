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
    
        <section class="container">
        <h4 class="mt-5">Connexion</h4>
        <div class="mt-5">
            <form method="post" class="w-50 mx-auto">
                <div class="mt-5">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="mt-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>            
                <input type="submit" class="btn btn-primary mt-5" value="Se connecter">
            </form>
            </div>
        </section>

<?php
require_once './commun/footer.php';
?>