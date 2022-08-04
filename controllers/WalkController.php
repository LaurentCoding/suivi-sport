<?php

class WalkController
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
    $walks = [];
    $req = $this->pdo->query("SELECT * FROM `walk`");
    $data = $req->fetchAll();
    foreach ($data as $walk){
      $walks[] = new Walk($walk);
    }
    return $walks;
  }

  //renvoie une seule date
  public function get(int $id): Walk
  {
      $req = $this->pdo->prepare("SELECT * FROM `walk` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $walk = new Walk($data);
      return $walk;
  }

  public function create(Walk $newWalk): void
  {
      $req = $this->pdo->prepare("INSERT INTO `walk` (pas, date_walk, annee_id) VALUES (:pas, :date_walk, :annee_id)");
      $req->bindValue(":pas", $newWalk->getPas(), PDO::PARAM_INT);
      $req->bindValue(":date_walk", $newWalk->getDate_walk(), PDO::PARAM_STR);
      $req->bindValue(":annee_id", $newWalk->getAnnee_id(), PDO::PARAM_INT);
        
      $req->execute();
  }

  public function update(Walk $walk): void
  {
    //code...
  }

  public function delete(int $id): void
  {
    $req = $this->pdo->prepare("DELETE FROM `walk` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }


}