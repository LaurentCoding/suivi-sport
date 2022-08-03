<?php

class AnneeController
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
  //Recupére toutes les années
  public function getAll(): array
  {
    $annees = [];
    $req = $this->pdo->query("SELECT * FROM `annee`");
    $data = $req->fetchAll();
    //var_dump($data);
    foreach ($data as $annee){
      $annees[] = new Annee($annee);
    }
    return $annees;
  }

  //renvoie une seule annee
  public function get(int $id): Annee
  {
      $req = $this->pdo->prepare("SELECT * FROM `annee` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $annee = new Annee($data);
      return $annee;
  } 

  public function create(Annee $newAnnee)//:void
  {
    $req = $this->pdo->prepare("INSERT INTO `annee` (annee_date) VALUES (:annee_date)");
    $req->bindParam(":annee_date", $newAnnee->getAnnee_date(), PDO::PARAM_INT);
    $req->execute();
  }

  public function update(Annee $annee)//:void
  {
    //code...
  }

  public function delete(int $id):void
  {
    $req = $this->pdo->prepare("DELETE FROM `annee` WHERE id = :id");
    $req->bindParam('id', $id, PDO::PARAM_INT);
    $req->execute();

  }


}