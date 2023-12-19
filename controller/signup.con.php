<?php

include "../model/personnel.php";
include "../controller/database.php";
$personnel = new Personnel();
$personnel->__construct(new db());


if(isset($_POST['submit'])){
    $prenom = $_POST['first_name'];
    $nom = $_POST['last_name'];
    $email = $_POST['email'];
    $motdepasse = $_POST['password'];
    $phone = $_POST['phone'];
    $date_dajout = $_POST['date_dajout'];
    
    $personnel->setValues($nom_perso, $prenom_perso, $email, $motdepasse, $numero, $role, $date_dajout);

    if ($personnel->insertPerson($nom_perso, $prenom_perso, $email, $motdepasse, $numero, $role, $date_dajout)) {
        header("Location: ../view/login.php");
        exit;
    } else {

        echo "Error inserting data into the database.";
    }

}


