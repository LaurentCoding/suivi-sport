<?php

class Annee
{
  private int $id;
  private int $annee_date;

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
            //var_dump($method);
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
   * Get the value of annee_date
   */ 
  public function getAnnee_date()
  {
    return $this->annee_date;
  }

  /**
   * Set the value of annee_date
   *
   * @return  self
   */ 
  public function setAnnee_date($annee_date)
  {
    $this->annee_date = $annee_date;

    return $this;
  }
}