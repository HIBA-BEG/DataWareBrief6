<?php

class Projet
{
  // Grabing the data
  private $db;
  private $nom_projet;
  private $description;
  private $date_creation;
  private $date_fin;
  private $status;
  private $ID_productOwner;
  private $ID_equipe;

  public function __construct()
  {
    $this->db = new db();
  }

  // public function __construct($nom_projet, $description, $date_creation, $date_fin, $status, $ID_productOwner, $ID_equipe)
  // {
  //     $this->nom_projet = $nom_projet;
  //     $this->prenom_perso = $description;
  //     $this->date_creation = $date_creation;
  //     $this->date_fin = $date_fin;
  //     $this->status = $status;
  //     $this->ID_productOwner = $ID_productOwner;
  //     $this->ID_equipe = $ID_equipe;
  // }

  public function __get($property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value)
  {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }

  public function getAllProjets()
  {
    $connexion = $this->db->connect();
    $sql = "SELECT * FROM projets";
    $stmt = $connexion->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
  }

  public function addProjet($nom_projet, $description, $date_creation, $date_fin, $status, $ID_productOwner, $ID_equipe)
  {
    $conn = $this->db->connect();
    $stmt = $conn->prepare("INSERT INTO projects (nom_projet, description, date_creation, date_fin, status, ID_productOwner, ID_equipe) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom_projet, $description, $date_creation, $date_fin, $status, $ID_productOwner, $ID_equipe]);
  }
}
