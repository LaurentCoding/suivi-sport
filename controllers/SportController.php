<?php

class SportController
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
    $sports = [];
    $req = $this->pdo->query("SELECT * FROM `sport`");
    $data = $req->fetchAll();
    foreach ($data as $sport){
      $sports[] = new Sport($sport);
    }
    return $sports;
  }

  //renvoie une seule date
  public function get(int $id): Sport
  {
      $req = $this->pdo->prepare("SELECT * FROM `sport` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $sport = new Sport($data);
      return $sport;
  }

  public function create(Sport $newSport): void
  {
      $req = $this->pdo->prepare("INSERT INTO `sport` (name) VALUES (:name)");
      $req->bindValue(":name", $newSport->getName(), PDO::PARAM_STR);
      $req->execute();
  }
  public function update(Sport $sport): void
  {
    //code...
  }

  public function delete(int $id): void
  {
    $req = $this->pdo->prepare("DELETE FROM `sport` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }

}