<?php
include 'database.php'; 
include '../model/projet.php';
include '../model/personnel.php';

$database = new db();


$projetObj = new Projet($database);
$personnelObj = new Personnel($database);

if (isset($_POST['addProjet'])) {
        $nom_projet = $_POST['nomProj'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];
        $date_fin = $_POST['date_fin'];
        $status = $_POST['status'];
        
        $projetObj->addProjet($nom_projet, $description, $date_creation, $date_fin, $status,$nom_projet, $description, $date_creation, $date_fin, $status, $ID_productOwner, $ID_equipe);

    }

$dataP = $projectObj->getAllProjets();
$data = $personObj->getAllPersonnel();