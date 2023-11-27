<?php 
    // include 'connexion.php';
    $serveur="localhost";
    $nomBD="dataware2";
    $login="root";
    $pass="";
    
    $connexion = mysqli_connect($serveur, $login, $pass, $nomBD);

    if (isset($_GET['supprimerID'])){
        $id=$_GET['supprimerID'];

        $sql = "DELETE FROM `personnel` WHERE `ID_perso` = '$id'";
        $result = mysqli_query($connexion,$sql);
        if ($result) {
            header("Location: ./index.php");
            exit();
        }else{
            die(mysql_error($connexion));
        }
    }

   
