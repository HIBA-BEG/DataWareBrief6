<?php
require('../connexion.php');

if (isset($_POST['save-btn'])) {
    $role = 'Product Owner';

    $updateQuery = "UPDATE personnel
                    SET  role = '$role' WHERE ID_perso = '$id'";

    $updateResult = mysqli_query($connexion, $updateQuery);

    if ($updateResult) {
        header('Location: index.php');
    }
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
                    <a href="./index.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Accueil</a>
                </li>
                <li>
                    <a href="./assignerPO.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Assigner</a>
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
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">                                                                                                                                                                                     
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Assigner un Product Owner
                    </h1>
                    <form class="max-w-md mx-auto" action="" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <select id="id" name="id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <!-- <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500"> -->
                            <?php
                                $sql = "SELECT * FROM personnel";
                                $result = mysqli_query($connexion, $sql);

                                // Check if the query was successful
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['ID_perso']; ?>">
                                            <?php echo $row['nom_perso'] ; ?>
                                            <?php echo $row['prenom_perso'] ; ?>
                                        </option>
                                        <?php
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                } else {
                                    // Handle the error, e.g., display an error message or log the error
                                    echo "Error: " . mysqli_error($connexion);
                                }
                                ?>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="role" id="role" value ="Product Owner" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " />
                        </div>
                        <button type="submit" name="save-btn" value="save" class="text-white bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Submit</button>
                    </form>
                </div>  
            </div>
        </div>
    </section>
    
</body>
</html>

