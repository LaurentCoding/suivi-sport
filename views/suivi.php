<?php
session_start();
require_once './commun/head.php';
require_once './commun/nav.php';
?>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Jour</th>
      <th scope="col">Km</th>
      <th scope="col">Durée</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>

<?php
require_once './commun/footer.php';
?>