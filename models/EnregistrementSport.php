<?php

class EnregistrementSport
{
  private int $id;
  private int $annee_id;
  private int $sport_id;
  private string $jour;
  private string $duree;
  private int $km;

  // Constructeur
  public function __construct(array $data)
  {
      $this->hydrate($data);
  }

  // Méthodes
  public function hydrate(array $data): void
  {
      foreach ($data as $key => $value) {
          $method = "set" . ucfirst($key);
          if (method_exists($this, $method)) {
            $this->$method($value);
          }
      }
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of annee_id
   */ 
  public function getAnnee_id()
  {
    return $this->annee_id;
  }

  /**
   * Set the value of annee_id
   *
   * @return  self
   */ 
  public function setAnnee_id($annee_id)
  {
    $this->annee_id = $annee_id;

    return $this;
  }

  /**
   * Get the value of sport_id
   */ 
  public function getSport_id()
  {
    return $this->sport_id;
  }

  /**
   * Set the value of sport_id
   *
   * @return  self
   */ 
  public function setSport_id($sport_id)
  {
    $this->sport_id = $sport_id;

    return $this;
  }

  /**
   * Get the value of jour
   */ 
  public function getJour()
  {
    return $this->jour;
  }

  /**
   * Set the value of jour
   *
   * @return  self
   */ 
  public function setJour($jour)
  {
    $this->jour = $jour;

    return $this;
  }

  /**
   * Get the value of duree
   */ 
  public function getDuree()
  {
    return $this->duree;
  }

  /**
   * Set the value of duree
   *
   * @return  self
   */ 
  public function setDuree($duree)
  {
    $this->duree = $duree;

    return $this;
  }

  /**
   * Get the value of km
   */ 
  public function getKm()
  {
    return $this->km;
  }

  /**
   * Set the value of km
   *
   * @return  self
   */ 
  public function setKm($km)
  {
    $this->km = $km;

    return $this;
  }
}