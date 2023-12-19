<?php
include "../controller/database.php";

class Personnel
{
  // Grabing the data
  private $nom_perso;
  private $prenom_perso;
  private $email;
  private $motdepasse;
  private $numero;
  private $role;
  private $date_dajout;

  private $db;


  public function __construct()
  {
    $this->db = new db();
  }


  public function authenticate($email, $motdepasse)
  {
    try {
      $connexion = $this->db->connect();
      $stmt = $connexion->prepare("SELECT * FROM personnel WHERE email = :email AND motdepasse = :motdepasse");
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':motdepasse', $motdepasse);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);


      if ($row) {
        $_SESSION['user_id'] = $row['ID_perso'];
        $_SESSION['user_name'] = $row['nom_perso'];
        $_SESSION['user_role'] = $row['role'];

        echo "Login successful. Welcome, {$_SESSION['user_name']}!";

        switch ($_SESSION['user_role']) {
          case "admin":
            $_SESSION['status'] = 'admin';
            header("Location: ../view/index.php");
            exit;
          case "scrum_master":
            $_SESSION['status'] = 'ScrumMaster';
            header("Location: ../view/indexS.php");
            exit;
          case "membre":
            $_SESSION['status'] = 'membre';
            header("Location: ../view/indexM.php");
            exit;
          case "product_owner":
            $_SESSION['user_role'] = 'ProductOwner';
            header("Location: ../view/indexP.php");
            exit;
        }
      } else {
        return "Email or password is incorrect";
      }
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }


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


  public function setValues($nom_perso, $prenom_perso, $email, $motdepasse, $numero, $role, $date_dajout)
  {
    $this->nom_perso = $nom_perso;
    $this->prenom_perso = $prenom_perso;
    $this->email = $email;
    $this->motdepasse = $motdepasse;
    $this->numero = $numero;
    $this->role = $role;
    $this->date_dajout = $date_dajout;
  }

  public function insertPerson($nom_perso, $prenom_perso, $email, $motdepasse, $numero, $date_dajout)
  {
    $connexion = $this->db->connect();
    $sql = "INSERT INTO persons (nom_perso, prenom_perso, email, motdepasse, numero, date_dajout) VALUES(:nom_perso, :prenom_perso, :email, :motdepasse, :numero, :date_dajout)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':nom_perso', $nom_perso);
    $stmt->bindParam(':prenom_perso', $prenom_perso);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motdepasse', $motdepasse);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':date_dajout', $date_dajout);

    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
  
  public function getAllPersonnel()
  {
    $connexion = $this->db->connect();
    $stmt = $connexion->query("SELECT * FROM personnel");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function addPerson($name, $email, $phone, $role)
  // {
  //   $connexion = $this->db->connect();
  //   $stmt = $connexion->prepare("INSERT INTO persons (Nom, Email, Telephone, Role) VALUES (?, ?, ?, ?)");
  //   $stmt->execute([$name, $email, $phone, $role]);
  // }


  // public function getTeams()
  // {
  //   $conn = $this->db->connect();
  //   $sql = "SELECT * FROM persons JOIN equipes JOIN projects WHERE persons.equipe_ID = equipes.id";
  //   $stmt = $conn->query($sql);
  //   $row = $stmt->fetch(PDO::FETCH_BOTH);

  //   return $row;
  // }

  // public function getTeamMembers()
  // {
  //   $conn = $this->db->connect();
  //   $sql = "SELECT * FROM persons JOIN equipes WHERE persons.equipe_ID = equipes.id";
  //   $stmt = $conn->query($sql);
  //   $data = array();

  //   while ($rowmember = $stmt->fetch(PDO::FETCH_BOTH)) {
  //     $data[] = $rowmember;
  //   }

  //   return $data;
  // }


}
