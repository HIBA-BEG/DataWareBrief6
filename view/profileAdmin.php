<?php
    session_start();	
	require '../connexion.php'; 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="../assets/dataware-white.png" class="h-8" alt="dataware Logo" />
        </a>
        <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="./index.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Accueil</a>
                </li>
                <li>
                    <a href="./profileAdmin.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                </li>
                <li>
                    <a href="./deconnexionA.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Deconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-22 h-10 mr-2" src="../assets/dataware-white.png" alt="logo">    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">                                                                                                                                                                                     
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Mon Profile 
                    </h1>
                    <?php
                    $sql = "SELECT * FROM personnel where ID_perso = '2'";
                    $result = mysqli_query($connexion, $sql);
                    $row = mysqli_fetch_assoc($result)
                    ?>
                    <div class="max-w-md mx-auto">
                        <div class="relative z-0 w-full mb-5 group">
                            <p class="text-lime-500">Identifiant: <?php echo $row['ID_perso']; ?> </p>
                            <p class="text-lime-500"> Nom: <?php echo $row['nom_perso']; ?> </p>
                            <p class="text-lime-500"> Prenom: <?php echo $row['prenom_perso']; ?> </p>
                            <p class="text-white"> Numero de telephonne: <?php echo $row['numero']; ?> </p>
                            <p class="text-white"> Role: <?php echo $row['role']; ?> </p>
                            <p class="text-white"> Date d'ajout: <?php echo $row['date_dajout']; ?> </p>
                            <p class="text-white"> Identifiant d'equipe: <?php echo $row['ID_eq'];?> </p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
</body>
</html>

