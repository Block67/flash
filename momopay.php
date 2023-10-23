<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash</title>
    <link href="css/output.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 fixed top-0 w-full z-50">
            <div class="flex items-center justify-between mx-auto max-w-screen-xl">
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center">
                        <img src="img/Logo Flash.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flash</span>
                    </a>
                </div>
                <div class="hidden lg:flex lg:items-center lg:w-auto" id="menu">
                    <ul class="flex items-center font-medium space-x-8">
                        <li>
                            <a href="index.php" class="text-primary-700 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">Testinomie</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">FAQs</a>
                        </li>
                    </ul>
                </div>
                <div class="hidden lg:flex lg:items-center lg:w-auto">
                    <a href="login.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="signup.php" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                </div>
                <div class="lg:hidden">
                    <button data-collapse-toggle="mobile-menu" type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-gray-300" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hidden" id="mobile-menu">
                <ul class="flex flex-col mt-4 font-medium">
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Testinomie</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">FAQs</a>
                    </li>
                    <li>
                        <a href="login.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Log in</a>
                    </li>
                    <li>
                        <a href="signup.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Get started</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header></br></br></br></br>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="text-center flex justify-center">
                <div>
                    <img src="img/Ellipse 5.svg" alt="Description de l'image" class="w-200 h-150 object-cover mx-4" />
                </div>
                <div>
                    <img src="img/Ellipse 6.svg" alt="Description de l'image" class="w-200 h-150 object-cover mx-4" />
                </div>
                <div>
                    <img src="img/Ellipse 7.svg" alt="Description de l'image" class="w-200 h-150 object-cover mx-4" />
                </div>
            </div>


            <form>
                <div class="mb-6">
                    <label for="#" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Network</label>
                    <select id="#" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <option value="" disabled selected>Select Network</option>
                        <option value="mtn">MTN</option>
                        <option value="moov">MOOV</option>
                        <option value="celtis">CELTIS</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    <input type="number" id="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
            </form>


        </div>
        <div class="flex justify-center">
            <a href="momopaysuccess.php">
                <button class="inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900" style="background-color: #ff7c2a;">
                    PAY
                </button>
            </a>
        </div>
    </section>



    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>