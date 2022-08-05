<?php

class Walk 
{
  private int $id;
  private int $pas;
  private string $date_walk;
  private int $annee_id;
  private int $month_id;

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
   * Get the value of pas
   */ 
  public function getPas()
  {
    return $this->pas;
  }

  /**
   * Set the value of pas
   *
   * @return  self
   */ 
  public function setPas($pas)
  {
    $this->pas = $pas;

    return $this;
  }

  /**
   * Get the value of date_walk
   */ 
  public function getDate_walk()
  {
    return $this->date_walk;
  }

  /**
   * Set the value of date_walk
   *
   * @return  self
   */ 
  public function setDate_walk($date_walk)
  {
    $this->date_walk = $date_walk;

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
    if($annee_id > 0){
    $this->annee_id = $annee_id;
    }
    return $this;
  }

  /**
   * Get the value of month_id
   */ 
  public function getMonth_id()
  {
    return $this->month_id;
  }

  /**
   * Set the value of month_id
   *
   * @return  self
   */ 
  public function setMonth_id($month_id)
  {
    $this->month_id = $month_id;

    return $this;
  }
}