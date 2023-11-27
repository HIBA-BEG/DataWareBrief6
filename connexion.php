<?php
if ($_POST) {
  # code...
	
    $serveur="localhost";
    $nomBD="dataware2";
    $login="root";
    $pass="";
    
    $email = $_POST['email'];
    $motdepasse = $_POST['password'];

    $connexion = mysqli_connect($serveur, $login, $pass, $nomBD);

    $query= "SELECT * FROM personnel WHERE email='$email' AND motdepasse='$motdepasse'";
  
    $result = mysqli_query($connexion, $query);
    if (mysqli_num_rows($result)==1) {
      session_start();

      $_SESSION['authenticated'] = true;
      header('Location: index.php'); 
    } else {
      echo 'wrong email address or password';
    }

  }
?>