<?php

class EnregistremntSportController
{
  private PDO $db;

  public function __construct()
  {
    try {
      (new DotEnv(__DIR__ . '/../.env'))->load();
      $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
    } catch (PDOException $error) {
      var_dump($error);
      echo "<p style='color: red'>$error</p>";
    }
  }

  public function setPdo(PDO $pdo)
  {
    $this->pdo = $pdo;
    return $this;
  }
  //Recup tous
  public function getAll(): array
  {
    $activites = [];
    $req = $this->pdo->query("SELECT * FROM `suivi`");
    $data = $req->fetchAll();
    foreach ($data as $activite){
      $activites[] = new Walk($activite);
    }
    return $activites;
  }

  //renvoie une seule date
 /*  public function get(int $id): Walk
  {
      $req = $this->pdo->prepare("SELECT * FROM `walk` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $walk = new Walk($data);
      return $walk;
  } */

  public function create(Walk $newWalk): void
  {
    //code...
  }

  public function update(Walk $walk): void
  {
    //code...
  }

  public function delete(Walk $walk): void
  {
    //code...
  }


}