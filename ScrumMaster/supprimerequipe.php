<?php 
    require '../connexion.php'; 

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

   
