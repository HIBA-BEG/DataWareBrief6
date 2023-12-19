<?php
session_start();

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../assets/dataware-white.png" class="h-8" alt="dataware Logo" />
            </a>
            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="./indexM.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Accueil</a>
                    </li>
                    <li>
                        <a href="./profileSMembre.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                    </li>
                    <li>
                        <a href="./deconnexionM.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-white md:dark:hover:text-lime-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="dark:bg-gray-900 bg-gray-50 mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24 ">
        <div class="space-y-12 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
            <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Mes équipes de DATAWARE</h2>
        </div>
        <div class="mx-auto max-w-screen-xl p-4 lg:px-12">
            <!-- Start coding here -->
            <div class=" dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID équipe </th>
                                <th scope="col" class="px-4 py-3">Nom équipe</th>
                                <th scope="col" class="px-4 py-3">ID membre</th>
                                <th scope="col" class="px-4 py-3">Nom membre</th>
                                <th scope="col" class="px-4 py-3">Prenom membre</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">date d'ajout de membre</th>
                                <th scope="col" class="px-4 py-3">Identifiant de Scrum Master</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM equipe INNER JOIN personnel ON equipe.ID_equipe=personnel.ID_eq where personnel.role=4";
                            // $sql = "SELECT * FROM equipe INNER JOIN personnel ON equipe.ID_equipe=personnel.ID_eq INNER JOIN projets ON projets.ID_equipe=equipe.ID_equipe where personnel.role=4";

                            $result = mysqli_query($connexion, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['prenom_perso']; ?></th>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['email']; ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['date_dajout']; ?></td>
                                    <td class="px-4 py-3"><?php echo $row['ID_scrum']; ?></td>
                                </tr>
                            <?php
                            }

                            // Free result set
                            mysqli_free_result($result);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="dark:bg-gray-900 bg-gray-50 mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24 ">
        <div class="space-y-12 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
            <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Mes équipes de DATAWARE</h2>
        </div>
        <div class="mx-auto max-w-screen-xl p-4 lg:px-12">
            <!-- Start coding here -->
            <div class=" dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID équipe </th>
                                <th scope="col" class="px-4 py-3">Nom équipe</th>
                                <th scope="col" class="px-4 py-3">ID membre</th>
                                <th scope="col" class="px-4 py-3">Nom membre</th>
                                <th scope="col" class="px-4 py-3">Prenom membre</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">date d'ajout de membre</th>
                                <th scope="col" class="px-4 py-3">Identifiant de Scrum Master</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM equipe INNER JOIN personnel ON equipe.ID_equipe=personnel.ID_eq where personnel.role=4";
                            // $sql = "SELECT * FROM equipe INNER JOIN personnel ON equipe.ID_equipe=personnel.ID_eq INNER JOIN projets ON projets.ID_equipe=equipe.ID_equipe where personnel.role=4";

                            $result = mysqli_query($connexion, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['prenom_perso']; ?></th>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['email']; ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['date_dajout']; ?></td>
                                    <td class="px-4 py-3"><?php echo $row['ID_scrum']; ?></td>
                                </tr>
                            <?php
                            }

                            // Free result set
                            mysqli_free_result($result);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="space-y-12 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
            <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Mes projets de DATAWARE</h2>
        </div>
        <div class="mx-auto max-w-screen-xl p-4 lg:px-12">
            <!-- Start coding here -->
            <div class=" dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID projet </th>
                                <th scope="col" class="px-4 py-3">Nom projet</th>
                                <th scope="col" class="px-4 py-3">ID membre</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">status</th>
                                <th scope="col" class="px-4 py-3">Identifiant de ProductOwner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM equipe INNER JOIN projets ON equipe.ID_equipe=personnel.ID_eq where personnel.role=4";
                            // $sql = "SELECT * FROM equipe INNER JOIN personnel ON equipe.ID_equipe=personnel.ID_eq INNER JOIN projets ON projets.ID_equipe=equipe.ID_equipe where personnel.role=4";

                            $result = mysqli_query($connexion, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_equipe']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['ID_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['nom_perso']; ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['prenom_perso']; ?></th>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['email']; ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo $row['date_dajout']; ?></td>
                                    <td class="px-4 py-3"><?php echo $row['ID_scrum']; ?></td>
                                </tr>
                            <?php
                            }

                            // Free result set
                            mysqli_free_result($result);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>