<?php
    session_start();	
	// require 'connexion.php'; 

    $serveur="localhost";
    $nomBD="dataware2";
    $login="root";
    $pass="";
    
    $connexion = mysqli_connect($serveur, $login, $pass, $nomBD);

    $ID= $_GET['modifierID'];

    $row = array();
    
    if (isset($_POST['nom_perso'])) {
        $nom = $_POST['nom_perso'];
        $prenom = $_POST['last_name'];
        $email = $_POST['email'];
        $motdepasse = $_POST['password'];
        $phone = $_POST['phone'];
        $date_dajout = $_POST['date_dajout'];

        $select = "SELECT * FROM personnel WHERE ID_perso = '$ID'";
        $result = mysqli_query($connexion, $select);
        $row = mysqli_fetch_array($result);

        // Assuming $connexion is your database connection object
        $sql = "UPDATE personnel SET nom_perso='$nom', prenom_perso='$prenom', email='$email', motdepasse='$motdepasse', numero= '$phone' , role='$role', date_dajout='$date_dajout' WHERE ID_perso = '$ID'";

        $result1 = mysqli_query($connexion,$sql);
        if ($result) {
        header("Location: ./index.php");
        exit();
        }else{
            die(mysql_error($connexion));
        }
        

        // Close the result set
        // mysqli_free_result($result);
        
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
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-22 h-10 mr-2" src="./assets/dataware-white.png" alt="logo">    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">                                                                                                                                                                                     
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Modifier le compte 
                    </h1>
                    <form class="max-w-md mx-auto" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" value="<?php echo $row['nom_perso']; ?>" name="nom_perso" id="nom_perso" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " placeholder="First name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" value="<?php echo $row['prenom_perso']; ?>" name="last_name" id="last_name" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Last name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Email address" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" value="<?php echo $row['motdepasse']; ?>" name="password" id="password" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Password" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="tel"  value="<?php echo $row['numero']; ?>" name="phone" id="phone" class=" py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Phone number (123-456-7890)" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <select type="text" value="<?php echo $row['role']; ?>" name="role" id="role" class=" w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
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
                            <input type="date" name="date_dajout" id="date_dajout" value ="<?php echo date('Y-m-d') ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " />
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

