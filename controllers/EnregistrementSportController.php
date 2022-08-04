<?php

class EnregistrementSportController
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
      $activites[] = new EnregistrementSport($activite);
    }
    return $activites;
  }

  //renvoie une seule date
  public function get(int $id): EnregistrementSport
  {
      $req = $this->pdo->prepare("SELECT * FROM `suivi` WHERE id = :id");
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $enregistrementSport = new EnregistrementSport($data);
      return $enregistrementSport;
  } 

  public function create(EnregistrementSport $newEnregistrementSport): void
  {
    $req = $this->pdo->prepare("INSERT INTO `suivi` (annee_id, sport_id, jour, duree, km) VALUE (:annee_id, :sport_id, :jour, :duree, :km)");
    $req->bindValue(":annee_id", $newEnregistrementSport->getAnnee_id(), PDO::PARAM_INT);
    $req->bindValue(":sport_id", $newEnregistrementSport->getSport_id(), PDO::PARAM_INT);
    $req->bindValue(":jour", $newEnregistrementSport->getJour(), PDO::PARAM_STR);
    $req->bindValue(":duree", $newEnregistrementSport->getDuree(), PDO::PARAM_STR);
    $req->bindValue(":km", $newEnregistrementSport->getKm(), PDO::PARAM_STR);

    $req->execute();

  }

  public function update(EnregistrementSport $walk): void
  {
    //code...
  }

  public function delete(int $id): void
  {
    $req = $this->pdo->prepare("DELETE FROM `suivi` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }


}