<?php

class user {
    // Grabing the data
    private $nom_equipe;
    private $date_creation;
    private $date_fin;
    private $ID_scrum;

    public function __construct($nom_equipe, $date_creation, $date_fin, $ID_scrum)
    {
        $this->nom_equipe = $nom_equipe;
        $this->date_creation = $date_creation;
        $this->date_fin = $date_fin;
        $this->ID_scrum = $ID_scrum;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    
        return $this;
      }
    
}
