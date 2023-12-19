
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
                        Créer un compte 
                    </h1>
                    <form class="max-w-md mx-auto" action="" method="post">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none " placeholder="First name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Last name" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Email address" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Password" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Confirm password" required />
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="tel"  name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-lime-500 focus:outline-none" placeholder="Phone number (123-456-7890)" required />
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

