<?php
	require 'connexion.php';

  $ID = $_GET['modifierID'];

  if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $nomEquipe = $_POST['nomEquipe'];
    
    $sql = "UPDATE membre SET NOM_membre='$nom', prenom_membre='$prenom' , email_membre='$email' , phone_number= '$phone' , role='$role', status='$status' WHERE ID_membre = '$ID'";
    
    $result = mysqli_query($connexion,$sql);
    if ($result) {
      header("Location: ./index.php");
      exit();
    }else{
        die(mysql_error($connexion));
    }
  }

  //fetch data for the form
  $select = "SELECT * FROM membre WHERE ID_membre = '$ID'";
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
    <nav class="bg-red-700">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!--
                Icon when menu is closed.

                Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                Icon when menu is open.

                Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
                <img class="h-12 w-auto" src="./skull.webp" alt="PERSONNEL">
            </div>
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                <a href="index.php" class="text-gray-300 hover:bg-red-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">HOME</a>
                <a href="ajoutMembre.php" class="text-gray-300 hover:bg-red-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">AJOUTER</a>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="index.php" class="text-gray-300 hover:bg-red-900 hover:text-white block rounded-md px-3 py-2 text-base font-medium">HOME</a>
            <a href="ajoutMembre.php" class="text-gray-300 hover:bg-red-900 hover:text-white block rounded-md px-3 py-2 text-base font-medium">AJOUTER</a>
        </div>
        </div>
    </nav>

    <div class="space-y-12 m-auto">
        <form  method="post">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">MODIFIER LE MEMBRE</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom Membre</label>
                <div class="mt-2">
                    <input type="text" value="<?php echo $row['NOM_membre'] ?>" name="nom" id="nom" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>
                
                <div class="sm:col-span-3">
                    <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prenom Membre</label>
                    <div class="mt-2">
                    <input type="text"  value="<?php echo $row['prenom_membre'] ?>" name="prenom" id="prenom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>

                <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Membre</label>
                <div class="mt-2">
                    <input id="email" value="<?php echo $row['email_membre'] ?>" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>
                <div class="sm:col-span-3">
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                <div class="mt-2">
                    <input type="text" value="<?php echo $row['phone_number'] ?>" name="phone" id="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>

                <div class="sm:col-span-3">
                <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                <div class="mt-2">
                    <input type="text" value="<?php echo $row['role'] ?>" name="role" id="role" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>
            
                <div class="sm:col-span-3">
                <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                <div class="mt-2">
                    <input type="text" value="<?php echo $row['status'] ?>" name="status" id="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                </div>
            
                <div class="sm:col-span-3">
                <label for="nomEquipe" class="block text-sm font-medium leading-6 text-gray-900">Nom d'equipe</label>
                <div class="mt-2">
                    <select id="nomEquipe" value="<?php echo $row['ID_eq'] ?>" name="nomEquipe" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <!-- <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500"> -->
                        <?php
                            $sql = "SELECT * FROM equipe";
                            $result = mysqli_query($connexion, $sql);

                            // Check if the query was successful
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['ID_equipe']; ?>">
                                        <?php echo $row['nom_equipe'] ; ?>
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
                </div>

            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-center gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" name="modifier-btn" value="modifier" class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </form>
    </div>
</body>
</html>


