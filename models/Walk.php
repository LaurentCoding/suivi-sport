<?php

class Walk 
{
  private int $id;
  private int $pas;
  private string $release_date;

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
   * Get the value of release_date
   */ 
  public function getRelease_date()
  {
    return $this->release_date;
  }

  /**
   * Set the value of release_date
   *
   * @return  self
   */ 
  public function setRelease_date($release_date)
  {
    $this->release_date = $release_date;

    return $this;
  }
}