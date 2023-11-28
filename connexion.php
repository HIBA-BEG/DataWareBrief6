<?php
    $serveur="localhost";
    $nomBD="dataware2";
    $login="root";
    $pass="";

    $connexion = mysqli_connect($serveur, $login, $pass, $nomBD);
  
    if(mysqli_connect_errno()){
      echo "Failed to connect!";
      exit();
    }
?>