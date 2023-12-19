<?php
    session_start();	
	require '../connexion.php'; 
    

    if (isset($_POST['save-btn'])) {
        $nomProj = $_POST['nom_projet'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];
        $date_fin = $_POST['date_fin'];
        $status = $_POST['status'];
        
        // Assuming $connexion is your database connection object
        $sql = "INSERT INTO projets (nom_projet, description, date_creation, date_fin, status) VALUES (?, ?, ?, ?, ?)";
        
        
        // Use prepared statement to prevent SQL injection
        $stmt = mysqli_prepare($connexion, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssss", $nomProj, $description, $date_creation, $date_fin, $status);

      
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: ./indexP.php");
            exit();
        } else {
            // Display the error message
            echo "Error: " . mysqli_error($connexion);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
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
                    <a href="./indexS.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Accueil</a>
                </li>
                <li>
                    <a href="./assignerM.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Assigner un membre</a>
                </li>
                <li>
                    <a href="./profileScrumMaster.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                </li>
                <li>
                    <a href="./deconnexionS.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Deconnexion</a>
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
                        Ajouter un projet :  
                    </h1>
                    <form class="max-w-md mx-auto" action="" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="nomProj" id="nomProj" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " placeholder="Nom du projet" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="description" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="date" name="date_creation" id="date_creation" value ="<?php echo date('Y-m-d') ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="date" name="date_fin" id="date_fin" value ="<?php echo date('Y-m-d') ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Statut" required />
                        </div>
                        
                        <button type="submit" name="save-btn" value="save" class="text-white bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">AJOUTER</button>
                    </form>
                </div>  
            </div>
        </div>
    </section>
    
<!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->

    
</body>
</html>

