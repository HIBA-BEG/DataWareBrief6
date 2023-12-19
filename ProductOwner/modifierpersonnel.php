<?php
    session_start();	
	require '../connexion.php'; 

    $ID= $_GET['modifierID'];

    $row = array();
    
    if (isset($_POST['prenom_perso'])) {
        $prenom = $_POST['prenom'];
        $role = $_POST['role'];
        // $nomEquipe = $_POST['ID_equipe'];

        // Assuming $connexion is your database connection object
        $sql = "UPDATE personnel SET  role='$role' WHERE ID_perso = '$ID'";
        
        $result = mysqli_query($connexion,$sql);
        if ($result) {
            header("Location: ./indexP.php");
            exit();
        }else{
            die(mysqli_error($connexion));
        }
    }
        
        
        // Close the result set
        $select = "SELECT * FROM personnel WHERE ID_perso = '$ID'";
        $result = mysqli_query($connexion, $select);
        $row = mysqli_fetch_array($result);
        // mysqli_free_result($result);  
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
                        Modifier le compte 
                    </h1>
                    <form class="max-w-md mx-auto" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" value="<?php echo $row['prenom_perso']; ?>" name="prenom" id="prenom" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Last name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <select type="text" value="<?php echo $row['role']; ?>" name="role" id="role" class="py-2.5 px-0 w-full text-sm text-gray-900 rounded-md border-gray-300 dark:text-gray-900 dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none ">
                            <?php
                                $sql = "SELECT * FROM personnel";
                                $result1 = mysqli_query($connexion, $sql);

                                // Check if the query was successful
                                if ($result1) {
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        ?>
                                            <option>
                                            <?php echo $row['role'] ; ?>
                                            </option>
                                        <?php
                                    }
                                    // Free result set
                                    mysqli_free_result($result1);
                                } else {
                                    // Handle the error, e.g., display an error message or log the error
                                    echo "Error: " . mysqli_error($connexion);
                                }
                                ?>
                    </select>
                            </div>
                        <div class="relative z-0 w-full mb-5 group">
                            

                        </div>
                        <button type="submit" name="save-btn" value="save" class="text-white bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Submit</button>
                    </form>
                </div>  
            </div>
        </div>
    </section>
<!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
</body>
</html>

