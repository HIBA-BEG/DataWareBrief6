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

<body class="dark:bg-gray-900">

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
    <!-- This example requires Tailwind CSS v2.0+ -->
    <section class="bg-gray-900">
        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Liste du personnel de DATAWARE</h2>
                </div>
                <ul role="list" class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0 lg:grid-cols-3 lg:gap-8">
                    <?php
                    $sql = "SELECT * FROM personnel";
                    $result = mysqli_query($connexion, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <li class="py-10 px-6 bg-gray-800 text-center rounded-lg xl:px-10 xl:text-left">
                            <div class="space-y-6 xl:space-y-10">
                                <img class="mx-auto h-20 w-20 rounded-full xl:w-36 xl:h-36" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                <div class="space-y-2 xl:flex xl:items-center xl:justify-between">
                                    <div class="font-medium text-lg leading-6 space-y-1">
                                        <h3 class="text-lime-500">Identifiant:
                                            <?php
                                            echo $row['ID_perso'];
                                            ?>
                                        </h3>
                                        <h3 class="text-lime-500"> Nom:
                                            <?php
                                            echo $row['nom_perso'];
                                            ?>
                                        </h3>
                                        <h3 class="text-lime-500"> Prenom:
                                            <?php
                                            echo $row['prenom_perso'];
                                            ?>
                                        </h3>
                                        <p class="text-white"> Mot de passe:
                                            <?php
                                            echo $row['motdepasse'];
                                            ?>
                                        </p>
                                        <p class="text-white"> Numero de telephonne:
                                            <?php
                                            echo $row['numero'];
                                            ?>
                                        </p>
                                        <p class="text-white"> Role:
                                            <?php
                                            echo $row['role'];
                                            ?>
                                        </p>
                                        <p class="text-white"> Date d'ajout:
                                            <?php
                                            echo $row['date_dajout'];
                                            ?>
                                        </p>
                                        <p class="text-white"> Identifiant d'equipe:
                                            <?php
                                            echo $row['ID_eq'];
                                            ?>
                                        </p>
                                    </div>

                                    <ul role="list" class="flex justify-center space-x-5">
                                        <li>
                                            <a href="modifierpersonnel.php?modifierID=<?php echo $row['ID_perso'] ?>" class="text-gray-400 hover:text-gray-300">
                                                <svg class="w-8 h-6" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                    <style>
                                                        svg {
                                                            fill: #84cc16
                                                        }
                                                    </style>
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="supprimerpersonnel.php?supprimerID=<?php echo $row['ID_perso'] ?>" class="text-gray-400 hover:text-gray-300">
                                                <svg class="w-6 h-6 mt-3" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                    <style>
                                                        svg {
                                                            fill: #84cc16
                                                        }
                                                    </style>
                                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php
                    }

                    // Free result set
                    mysqli_free_result($result);
                    ?>
                    <!-- More people... -->
                </ul>
            </div>
        </div>
    </section>

</body>

</html>