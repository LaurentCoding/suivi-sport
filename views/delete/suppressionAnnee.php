<?php
session_start();
function loadClass(string $class)
{ if ($class === "DotEnv") {
  require_once "../../config/$class.php";
} else if (str_contains($class, "Controller")) {
  require_once "../../controllers/$class.php";
} else {
  require_once "../../models/$class.php";
}
}

spl_autoload_register("loadClass");


  $anneeController = new AnneeController();
  $anneeController->delete($_GET['id']);
  echo "<script>window.location='../accueil.php'</script>";
