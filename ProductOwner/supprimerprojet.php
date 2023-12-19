<?php 
    // include 'connexion.php';
    $serveur="localhost";
    $nomBD="dataware2";
    $login="root";
    $pass="";
    
    $connexion = mysqli_connect($serveur, $login, $pass, $nomBD);

    if (isset($_GET['supprimerID'])){
        $id=$_GET['supprimerID'];

        $sql = "DELETE FROM `projets` WHERE `ID_projet` = '$id'";
        $result = mysqli_query($connexion,$sql);
        if ($result) {
            header("Location: ./indexP.php");
            exit();
        }else{
            die(mysqli_error($connexion));
        }
    }

   
