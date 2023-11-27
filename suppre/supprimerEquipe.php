<?php 
    include 'connexion.php';
    if (isset($_GET['supprimerID'])){
        $id=$_GET['supprimerID'];

        $sql = "DELETE FROM `equipe` WHERE `ID_equipe` = '$id'";
        $result = mysqli_query($connexion,$sql);
        if ($result) {
            header("Location: ./index.php");
            exit();
        }else{
            die(mysql_error($connexion));
        }
    }

   
