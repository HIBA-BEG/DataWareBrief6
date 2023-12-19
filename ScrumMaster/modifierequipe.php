<?php
    session_start();	
	require ('../connexion.php'); 

    $ID= $_GET['modifierID'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomProj = $_POST['nom_projet'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];
        $date_fin = $_POST['date_fin'];
        $status = $_POST['status'];
        $ID_productOw = $_POST['ID_productOwner'];
        $ID_equ = $_POST['ID_equipe'];

        // Assuming $connexion is your database connection object
        $sql = "UPDATE projets SET nom_projet='$nomProj', description='$description', date_creation='$date_creation', date_fin='$date_fin', status= '$status' , ID_productOwner='$ID_productOw', ID_equipe='$ID_equ' WHERE ID_projet = '$ID'";

        $result = mysqli_query($connexion,$sql);
        if ($result) {
        header("Location: ./index.php");
        exit();
        }else{
            die(mysqli_error($connexion));
        }
    }
        
        $select = "SELECT * FROM projets WHERE ID_projet = '$ID'";
        $result = mysqli_query($connexion, $select);
        $row = mysqli_fetch_array($result);

        
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
                        Modifier le projet 
                    </h1>
                    <form class="max-w-md mx-auto" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" value="<?php echo $row['nom_projet']; ?>" name="nomProj" id="nomProj" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " placeholder="First name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" value="<?php echo $row['description']; ?>" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Last name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="date" value="<?php echo $row['date_creation']; ?>" name="date_creation" id="date_creation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Email address" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="date" value="<?php echo date('Y-m-d') ?>" name="date_fin" id="date_fin" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Password" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text"  value="<?php echo $row['status']; ?>" name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Phone number (123-456-7890)" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text"  value="<?php echo $row['ID_productOwner']; ?>" name="ID_productOw" id="ID_productOw" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Phone number (123-456-7890)" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text"  value="<?php echo $row['ID_equ']; ?>" name="ID_equ" id="ID_equ" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Phone number (123-456-7890)" required />
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

