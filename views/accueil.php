<?php
session_start();
require_once './commun/head.php';
require_once './commun/nav.php';
?>
<h1>
  <?= $_SESSION && $_SESSION['username'] ? "<span>Bienvenue {$_SESSION["username"]}</span>" : ""; ?>
</h1>
<section>
  Choix des enregistrement de plusieurs dicipline
</section>


<?php
require_once './commun/footer.php';
?>