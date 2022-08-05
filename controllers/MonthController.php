<?php

class MonthController
{
  private PDO $pdo;

  public function __construct()
  {
    try {
      (new DotEnv(__DIR__ . '/../.env'))->load();
      $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
    } catch (PDOException $error) {
      //var_dump($error);
      echo "<p style='color: red'>$error</p>";
    }
  }

  public function setPdo(PDO $pdo)
  {
    $this->pdo = $pdo;
    return $this;
  }
  //Recupére tous les mois
  public function getAll(): array
  {
    $mois = [];
    $req = $this->pdo->query("SELECT * FROM `month`");
    $data = $req->fetchAll();
    //var_dump($data);
    foreach ($data as $month){
      $mois[] = new Month($month);
    }
    return $mois;
  }

  //renvoie un seul mois
  public function get(int $id): Month
  {
      $req = $this->pdo->prepare("SELECT * FROM `month` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $month = new Month($data);
      return $month;
  } 

  public function create( $newMonth)//:void
  {
    $req = $this->pdo->prepare("INSERT INTO `month` (name) VALUES (:name)");
    $req->bindParam(":name", $newMonth->getName(), PDO::PARAM_INT);
    $req->execute();
  }

  public function update(Month $mois)//:void
  {
    //code...
  }

  public function delete(int $id):void
  {
   //code...
  }


}